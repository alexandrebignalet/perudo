<?php

namespace App\Entity;

use Symfony\Component\Uid\Uuid;

class User
{
    private const USER_GAME_ID_KEY = '/$_perudo_$/';
    private Uuid $uuid;
    private string $name;

    /**
     * @param Uuid $uuid
     * @param string $name
     */
    public function __construct(Uuid $uuid, string $name)
    {
        $this->uuid = $uuid;
        $this->name = $name;
    }

    public function gameUserId()
    {
        return $this->uuid . self::USER_GAME_ID_KEY . $this->name();
    }

    public function uuid(): Uuid
    {
        return $this->uuid;
    }

    public function name(): string
    {
        return $this->name;
    }
}
