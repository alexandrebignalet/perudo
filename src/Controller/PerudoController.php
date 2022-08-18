<?php

namespace App\Controller;

use App\Entity\GameId;
use App\Entity\Perudo\Perudo;
use App\Repository\PerudoDoctrineRepository;
use App\Repository\PerudoFirebaseRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PerudoController
{
    private PerudoDoctrineRepository $repository;
    private EntityManager $em;
    private PerudoFirebaseRepository $firebaseRepository;

    public function __construct(EntityManagerInterface   $em,
                                PerudoDoctrineRepository $repository,
                                PerudoFirebaseRepository $firebaseRepository)
    {
        $this->repository = $repository;
        $this->em = $em;
        $this->firebaseRepository = $firebaseRepository;
    }


    /**
     * @Route("/games", name="create-game", methods={"POST"})
     * @throws \Throwable
     */
    public function create(): Response
    {
        $gameId = $this->em->wrapInTransaction(function () {
            $perudo = new Perudo();

            $gameId = $this->repository->save($perudo);
            $this->firebaseRepository->project($gameId, $perudo);
            return $gameId;
        });

        return new JsonResponse(["id" => $gameId->value()], 201, ['Content-Type' => 'application/json']);
    }

    /**
     * @Route("/games/{id}", name="join-game", methods={"POST"})
     * @throws \Throwable
     */
    public function join(Request $request, string $id): Response
    {
        $data = json_decode($request->getContent(), true);
        $this->em->wrapInTransaction(function () use ($id, $data) {
            $gameId = new GameId($id);
            $perudo = $this->repository->find($gameId);

            $perudo->join($data["name"]);

            $this->repository->save($perudo);
            $this->firebaseRepository->project($gameId, $perudo);
        });

        return new Response(null, 201);
    }
}
