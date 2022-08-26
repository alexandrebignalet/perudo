<?php

namespace App\Serializer;

use App\Entity\Perudo\Bet;
use App\Entity\Perudo\DiceValue;
use App\Entity\Perudo\Perudo;
use App\Entity\Perudo\Player;
use App\Entity\Perudo\PlayerTurn;
use App\Service\DiceLauncherImpl;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;

class PerudoDenormalizer implements ContextAwareDenormalizerInterface, DenormalizerAwareInterface, CacheableSupportsMethodInterface
{
    use DenormalizerAwareTrait;

    public function hasCacheableSupportsMethod(): bool
    {
        return $this->denormalizer instanceof CacheableSupportsMethodInterface && $this->denormalizer->hasCacheableSupportsMethod();
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
    {
        return true;
    }

    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): Perudo
    {
        $turn = $data['turn'];
        $lastBet = $data['lastBet'];
        $diceLauncherImpl = new DiceLauncherImpl();
        return new Perudo(
            $diceLauncherImpl,
            $data['playersNames'],
            is_null($turn) ? null : new PlayerTurn(
                $turn['current'],
                array_map(fn($value) => new Player(
                    $value['name'],
                    $value['dices'],
                    $value['isPalefico']
                ), $turn['activePlayers']),
                $diceLauncherImpl
            ),
            is_null($lastBet) ? null : new Bet(
                $lastBet['playerName'],
                $lastBet['diceNumber'],
                DiceValue::of($lastBet['diceValue']['value'])
            )
        );
    }
}
