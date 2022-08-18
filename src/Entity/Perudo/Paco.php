<?php

namespace App\Entity\Perudo;

class Paco extends DiceValue
{
    public static int $VALUE = 1;

    public function __construct()
    {
        parent::__construct(Paco::$VALUE);
    }

    public function __toString(): string
    {
        return 'Paco';
    }
}
