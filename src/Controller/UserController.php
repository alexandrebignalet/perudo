<?php

namespace App\Controller;

use App\Service\UserService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class UserController
{
    private UserService $userService;
    private SerializerInterface $serializer;

    public function __construct(UserService $userService, SerializerInterface $serializer)
    {
        $this->userService = $userService;
        $this->serializer = $serializer;
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
