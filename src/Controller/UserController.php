<?php

namespace App\Controller;

use App\Service\UserService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    /**
     * @Route("/users", name="create-user", methods={"PUT"})
     * @throws \Throwable
     */
    public function createOrUpdate(): Response
    {
        $user = $this->userService->createOrUpdate();
        $body = [
            'uuid' => $user->uuid(),
            'name' => $user->name()
        ];
        return new JsonResponse($body, 201, ['Content-Type' => 'application/json']);
    }
}
