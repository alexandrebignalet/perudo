<?php

namespace App\Tests;

use App\Entity\Perudo\Bet;
use App\Entity\Perudo\Perudo;
use App\Entity\Perudo\Player;
use App\Entity\Perudo\PlayerTurn;
use App\Serializer\PerudoDenormalizer;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;

class PerudoSerializationTest extends TestCase
{
    public function test_serialize_correctly()
    {
        $serializer = new Serializer([new PropertyNormalizer(), new PerudoDenormalizer()], ['json' => new JsonEncoder()]);
        $deserializer = new Serializer([new PerudoDenormalizer()], ['json' => new JsonEncoder()]);

        $perudo = $this->givenAPerudo();
        $json = $serializer->serialize($perudo, 'json', [AbstractNormalizer::IGNORED_ATTRIBUTES => ['diceLauncher']]);
        $perudoLoaded = $deserializer->deserialize($json, Perudo::class, 'json');

        $this->assertInstanceOf(Perudo::class, $perudoLoaded);
        $this->assertInstanceOf(PlayerTurn::class, $perudoLoaded->turn());
        $this->assertInstanceOf(Player::class, $perudoLoaded->turn()->activePlayers()[0]);
        $this->assertInstanceOf(Bet::class, $perudoLoaded->lastBet());


        $otherJson = $serializer->serialize($perudoLoaded, 'json', [AbstractNormalizer::IGNORED_ATTRIBUTES => ['diceLauncher']]);
        $this->assertEquals($otherJson, $json);
    }

    /**
     * @return Perudo
     */
    public function givenAPerudo(): Perudo
    {
        $perudo = new Perudo();
        $perudo->join("toto");
        $perudo->join("tata");
        $perudo->start();
        $perudo->bet($perudo->currentPlayerName(), 1, 2);
        return $perudo;
    }
}
