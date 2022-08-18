<?php

namespace App\Repository;

use App\Entity\Game;
use App\Entity\GameId;
use App\Entity\Perudo\Perudo;
use Psr\Log\LoggerInterface;

class PerudoDoctrineRepository
{
    private GameRepository $gameRepository;
    private LoggerInterface $logger;

    public function __construct(GameRepository $gameRepository, LoggerInterface $logger)
    {
        $this->gameRepository = $gameRepository;
        $this->logger = $logger;
    }

    /**
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\ORMException
     */
    public function save(Perudo $perudo): GameId
    {
        $game = new Game();
        $gameId = GameId::random();
        $game->setUuid($gameId->value());
        $game->setVersion(1);
        $game->setPayload(addslashes(serialize($perudo)));

        $this->gameRepository->entityManager()->persist($game);
        $this->gameRepository->entityManager()->flush();

        return $gameId;
    }

    public function find(GameId $gameId): Perudo
    {
        $game = $this->gameRepository->findOneBy(['uuid' => $gameId->value()]);
        return unserialize(stripcslashes($game->getPayload()));
    }
}
