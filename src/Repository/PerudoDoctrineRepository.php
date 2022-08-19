<?php

namespace App\Repository;

use App\Entity\Game;
use App\Entity\GameId;
use App\Entity\Perudo\Perudo;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class PerudoDoctrineRepository
{
    private GameRepository $gameRepository;
    private SerializerInterface $serializer;

    public function __construct(GameRepository $gameRepository, SerializerInterface $serializer)
    {
        $this->gameRepository = $gameRepository;
        $this->serializer = $serializer;
    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\ORMException
     */
    public function save(Perudo $perudo, ?GameId $id = null): GameId
    {
        $game = is_null($id) ? new Game() : $this->findGame($id);
        $game->setVersion(is_null($id) ? 1 : $game->getVersion() + 1);
        $game->setPayload($this->serialize($perudo));

        $this->gameRepository->entityManager()->persist($game);
        $this->gameRepository->entityManager()->flush();

        return new GameId($game->getId());
    }

    private function findGame(GameId $gameId): Game
    {
        return $this->gameRepository->find($gameId->value());
    }

    public function find(GameId $gameId): Perudo
    {
        $game = $this->findGame($gameId);
        return $this->deserialize($game->getPayload());
    }

    public function serialize(Perudo $perudo): string
    {
        return $this->serializer->serialize($perudo, 'json', [AbstractNormalizer::IGNORED_ATTRIBUTES => ['diceLauncher']]);
    }

    public function deserialize(string $json): Perudo
    {
        return $this->serializer->deserialize($json, Perudo::class, 'json');
    }
}
