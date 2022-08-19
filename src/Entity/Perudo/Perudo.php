<?php

namespace App\Entity\Perudo;

use App\Service\DiceLauncher;
use App\Service\DiceLauncherImpl;
use InvalidArgumentException;

class Perudo
{
    private array $playersNames;
    private ?PlayerTurn $turn;
    private ?Bet $lastBet;
    private DiceLauncher $diceLauncher;

    public function __construct(DiceLauncher $diceLauncher = new DiceLauncherImpl(),
                                array        $playersNames = [],
                                ?PlayerTurn  $turn = null,
                                ?Bet         $lastBet = null)
    {
        $this->playersNames = $playersNames;
        $this->lastBet = $lastBet;
        $this->diceLauncher = $diceLauncher;
        $this->turn = $turn;
    }

    public function join(string $name)
    {
        if ($this->hasAlreadyPlayerNamed($name)) {
            throw new InvalidArgumentException("Tu ne peux pas avoir le même prénom que ton copain!");
        } else if ($this->playersCount() == 6) {
            throw new InvalidArgumentException("Le nombre de joueurs maximum est atteint!");
        } else {
            $this->playersNames[] = $name;
        }

    }

    public function start(): void
    {
        if ($this->playersCount() < 2) {
            throw new InvalidArgumentException ("Tu ne peux pas jouer à moins de deux joueurs!");
        }

        shuffle($this->playersNames);
        $this->turn = PlayerTurn::init($this->playersNames, $this->diceLauncher);
    }

    public function bet(string $playerName, int $diceNumber, int $diceValue)
    {
        if ($playerName != $this->currentPlayerName()) {
            throw new InvalidArgumentException("Tu essaies de tricher ce n'est pas à toi de jouer!");
        }

        $this->lastBet = Bet::of($playerName, $diceNumber, DiceValue::of($diceValue), $this->lastBet, $this->turn->isPalefico());
        $this->turn->goNext();
    }

    public function contestLastBet(string $playerName)
    {
        if ($playerName != $this->currentPlayerName()) {
            throw new InvalidArgumentException("Tu essaies de tricher ce n'est pas à toi de jouer!");
        }

        if (is_null($this->lastBet)) {
            throw new InvalidArgumentException("Personne n'a joué avant toi");
        }

        $this->turn->resolveContest($this->lastBet);
        $this->lastBet = null;
    }

    public function lastBet(): ?Bet
    {
        return $this->lastBet;
    }

    public function hasAlreadyPlayerNamed(string $name): bool
    {
        return array_search($name, $this->playersNames) !== false;
    }

    public function currentPlayerName(): string
    {
        return $this->turn?->current()->name();
    }

    public function playersCount(): int
    {
        return count($this->playersNames);
    }

    public function turn(): ?PlayerTurn
    {
        return $this->turn;
    }

    public function playersNames(): array
    {
        return $this->playersNames;
    }

    public function winner(): ?string
    {
        return $this->turn?->winner();
    }
}
