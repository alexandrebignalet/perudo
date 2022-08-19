<?php

namespace App\Service;

use App\Entity\User;
use App\Repository\PerudoFirebaseRepository;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Uid\Uuid;

class UserService
{
    private const PERUDO_USER_ID_HEADER = "perudo_user_id";
    private const PERUDO_USER_NAME_HEADER = "perudo_user_name";

    private PerudoFirebaseRepository $repository;
    private RequestStack $requestStack;

    public function __construct(RequestStack             $requestStack,
                                PerudoFirebaseRepository $repository)
    {
        $this->repository = $repository;
        $this->requestStack = $requestStack;
    }

    public function createOrUpdate(): User
    {
        $currentUser = $this->getSessionUser();
        return is_null($currentUser) ? $this->createUser() : $currentUser;
    }

    private function createUser(): User
    {
        $body = json_decode($this->currentRequest()->getContent(), true);
        $userName = $body["name"];
        $isUserNameInvalid = is_null($userName) && empty($userName);
        if ($isUserNameInvalid) {
            throw new BadRequestException("Choisit un nom");
        }

        $userId = Uuid::isValid($body["uuid"]) ? Uuid::fromString($body["uuid"]) : Uuid::v4();

        $user = new User($userId, $userName);

        $session = $this->currentRequest()->getSession();
        $session->start();
        $session->set(UserService::PERUDO_USER_NAME_HEADER, $userName);
        $session->set(UserService::PERUDO_USER_ID_HEADER, $userId);
        $this->repository->projectUser($user);

        return $user;
    }

    public function getUserOrThrow(): User
    {
        $user = $this->getSessionUser();
        if (is_null($user)) {
            throw new AuthenticationException("Identifie toi");
        }

        return $user;
    }

    private function getSessionUser(): ?User
    {
        $session = $this->currentRequest()->getSession();

        if (!$session->isStarted()) {
            return null;
        }

        return new User(
            $this->currentRequest()->getSession()->get(UserService::PERUDO_USER_ID_HEADER),
            $this->currentRequest()->getSession()->get(UserService::PERUDO_USER_NAME_HEADER)
        );
    }

    private function currentRequest(): Request
    {
        return $this->requestStack->getCurrentRequest();
    }
}
