<?php

namespace App\Entity;

use InvalidArgumentException;

class Perudo
{
    private array $players;
    private string $currentPlayerName;
    private Bet $lastBet;

    public function __construct()
    {
        $this->players = array();


    }

    public function join(string $name)
    {
        if($this->isAlreadyPlayerNamed($name))
        {
            throw new InvalidArgumentException("Tu ne peux pas avoir le même prénom que ton copain!");
        }
        else if ($this->playersCount() == 6)  {
            throw new InvalidArgumentException("Le nombre de joueurs maximum est atteint!");
        } else {
            $this->players[] = new Player($name);
        }

    }

    public function start()
    {
          if($this->playersCount() < 2)
          {
              throw new InvalidArgumentException ("Tu ne peux pas jouer à moins de deux joueurs!");
          }

         $this->currentPlayerName = $this->players[rand(0, $this->playersCount() -1)]->name();
    }

    public function currentPlayerName(): string
    {
        return $this->currentPlayerName;
    }

    public function bet(string $playerName, int $diceNumber, int $diceValue)
    {
        if ($playerName != $this->currentPlayerName()) {
            throw new InvalidArgumentException("Tu essaies de tricher ce n'est pas à toi de jouer!");
        }

        if ($diceNumber <= 0) {
            throw new InvalidArgumentException("Tu dois miser un nombre minimum de 1 dé!");
        }

        if ($diceValue < 2 || $diceValue > 6) {
            throw new InvalidArgumentException("Tu dois annoncer une valeur minimum de 2 et maximum de 6!");
        }
        $this->lastBet = new Bet($playerName, $diceNumber, $diceValue);
       // $this->currentPlayerName = $this->nextPlayer();
    }

    public function lastBet(): Bet
    {
        return $this->lastBet;
    }

    public function playersCount(): int
    {
        return count($this->players);
    }

    public function players(): array {
        return $this->players;
    }

    public function isAlreadyPlayerNamed(string $name): bool
    {
        for ($i = 0; $i < $this->playersCount(); $i++)
        {
          if ($this->players[$i]->name()==$name )
          {
              return true;
          }
        }
        return false;
    }

}
