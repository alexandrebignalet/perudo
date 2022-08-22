<?php

namespace App\Controller;

use App\Entity\GameId;
use App\Entity\Perudo\Perudo;
use App\Repository\PerudoDoctrineRepository;
use App\Repository\PerudoFirebaseRepository;
use App\Service\UserService;
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
    private UserService $userService;

    public function __construct(EntityManagerInterface   $em,
                                PerudoDoctrineRepository $repository,
                                PerudoFirebaseRepository $firebaseRepository,
                                UserService              $userService)
    {
        $this->repository = $repository;
        $this->em = $em;
        $this->firebaseRepository = $firebaseRepository;
        $this->userService = $userService;
    }


    /**
     * @Route("/games", name="create-game", methods={"POST"})
     * @throws \Throwable
     */
    public function create(): Response
    {
        $user = $this->userService->getUserOrThrow();
        $gameId = $this->em->wrapInTransaction(function () use ($user) {
            $perudo = new Perudo();
            $perudo->join($user->gameUserId());

            $gameId = $this->repository->save($perudo);
            $this->firebaseRepository->project($gameId, $perudo);
            return $gameId;
        });

        return new JsonResponse(["id" => $gameId->value()], 201, ['Content-Type' => 'application/json']);
    }

    /**
     * @Route("/games/{id}/join", name="join-game", methods={"POST"})
     * @throws \Throwable
     */
    public function join(string $id): Response
    {
        $user = $this->userService->getUserOrThrow();
        $this->em->wrapInTransaction(function () use ($user, $id) {
            $gameId = new GameId($id);
            $perudo = $this->repository->find($gameId);

            $perudo->join($user->gameUserId());

            $this->repository->save($perudo, $gameId);
            $this->firebaseRepository->project($gameId, $perudo);
        });

        return new Response(null, 201);
    }

    /**
     * @Route("/games/{id}/start", name="start-game", methods={"POST"})
     * @throws \Throwable
     */
    public function start(string $id): Response
    {
        $this->em->wrapInTransaction(function () use ($id) {
            $gameId = new GameId($id);
            $perudo = $this->repository->find($gameId);

            $perudo->start();

            $this->repository->save($perudo, $gameId);
            $this->firebaseRepository->project($gameId, $perudo);
        });

        return new Response(null, 201);
    }

    /**
     * @Route("/games/{id}/bet", name="bet", methods={"POST"})
     * @throws \Throwable
     */
    public function bet(string $id, Request $request): Response
    {
        $user = $this->userService->getUserOrThrow();
        $body = json_decode($request->getContent(), true);
        $this->em->wrapInTransaction(function () use ($body, $user, $id) {
            $gameId = new GameId($id);
            $perudo = $this->repository->find($gameId);

            $perudo->bet($user->gameUserId(), $body['number'], $body['value']);

            $this->repository->save($perudo, $gameId);
            $this->firebaseRepository->project($gameId, $perudo);
        });

        return new Response(null, 201);
    }

    /**
     * @Route("/games/{id}/contest", name="contest-last-bet", methods={"POST"})
     * @throws \Throwable
     */
    public function contest(string $id): Response
    {
        $user = $this->userService->getUserOrThrow();

        $this->em->wrapInTransaction(function () use ($user, $id) {
            $gameId = new GameId($id);
            $perudo = $this->repository->find($gameId);

            $perudo->contestLastBet($user->gameUserId());

            $this->repository->save($perudo, $gameId);
            $this->firebaseRepository->project($gameId, $perudo);
        });

        return new Response(null, 201);
    }
}
