<?php

namespace App\Entity;

class Bet
{
    private string $playerName;
    private int $diceNumber;
    private int $diceValue;

    public function __construct(string $playerName, int $diceNumber, int $diceValue)
    {
        $this->playerName = $playerName;
        $this->diceNumber = $diceNumber;
        $this->diceValue = $diceValue;
    }
}
