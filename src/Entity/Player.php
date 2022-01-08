<?php

namespace App\Entity;

class Player
{
    private string $name;
    private array $dices;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->dices = array();
        array_push($this->dices, 6, 6, 6, 6, 6);
        $this->randomizeDices();


    }
    public function diceCount() : int
    {
        return count($this->dices);
    }

    public function name() : string
    {
        return $this->name;
    }

    public function dices(): array
    {
        return $this->dices;
    }

    public function randomizeDices()
    {
       $this->dices = array_map(function() : int { return rand(1, 6); }, $this->dices);
    }

}
