<?php

namespace App\Entity;

use App\Service\DiceLauncher;
use App\Service\DiceLauncherImpl;
use InvalidArgumentException;
use JetBrains\PhpStorm\Pure;

class Perudo
{
    private array $players;
    private int $currentPlayerIndex;
    private ?Bet $lastBet;
    private DiceLauncher $diceLauncher;

    public function __construct(DiceLauncher $diceLauncher = new DiceLauncherImpl())
    {
        $this->players = array();
        $this->lastBet = null;
        $this->diceLauncher = $diceLauncher;
    }

    public function join(string $name)
    {
        if ($this->hasAlreadyPlayerNamed($name)) {
            throw new InvalidArgumentException("Tu ne peux pas avoir le même prénom que ton copain!");
        } else if ($this->playersCount() == 6) {
            throw new InvalidArgumentException("Le nombre de joueurs maximum est atteint!");
        } else {
            $this->players[] = new Player($name, Player::$START_DICES_COUNT, false, $this->diceLauncher);
        }

    }

    public function start()
    {
        if ($this->playersCount() < 2) {
            throw new InvalidArgumentException ("Tu ne peux pas jouer à moins de deux joueurs!");
        }

        $this->currentPlayerIndex = rand(0, $this->playersCount() - 1);
    }

    public function bet(string $playerName, int $diceNumber, int $diceValue)
    {
        if ($playerName != $this->currentPlayerName()) {
            throw new InvalidArgumentException("Tu essaies de tricher ce n'est pas à toi de jouer!");
        }

        $this->lastBet = new Bet($playerName, $diceNumber, DiceValue::of($diceValue), $this->lastBet, $this->isPalefico());
        $this->currentPlayerIndex = $this->nextPlayerIndex();
    }

    public function contestLastBet(string $playerName)
    {
        if ($playerName != $this->currentPlayerName()) {
            throw new InvalidArgumentException("Tu essaies de tricher ce n'est pas à toi de jouer!");
        }

        if (is_null($this->lastBet)) {
            throw new InvalidArgumentException("Personne n'a joué avant toi");
        }

        $contestFailed = $this->lastBet->diceNumber() > $this->countDicesWithValue($this->lastBet->diceValue(), !$this->isPalefico());
        if ($contestFailed) {
            $this->currentPlayerIndex = $this->previousPlayerIndex();
        }
        $this->lastBet = null;
        $this->players = array_map(fn(Player $player): Player => $this->currentPlayerName() == $player->name()
            ? $player->looseDice($this->diceLauncher)
            : $player->rerollDices($this->diceLauncher), $this->players);
    }

    public function lastBet(): ?Bet
    {
        return $this->lastBet;
    }

    public function playersCount(): int
    {
        return count($this->players);
    }

    public function players(): array
    {
        return $this->players;
    }

    public function hasAlreadyPlayerNamed(string $name): bool
    {
        for ($i = 0; $i < $this->playersCount(); $i++) {
            if ($this->players[$i]->name() == $name) {
                return true;
            }
        }
        return false;
    }

    #[Pure] private function nextPlayerIndex(): int
    {
        if ($this->currentPlayerIndex == $this->playersCount() - 1) return 0;
        return $this->currentPlayerIndex + 1;
    }

    #[Pure] private function previousPlayerIndex(): int
    {
        if ($this->currentPlayerIndex == 0) return $this->playersCount() - 1;
        return $this->currentPlayerIndex - 1;
    }

    private function countDicesWithValue(DiceValue $diceValue, bool $withPaco = true): int
    {
        return array_reduce($this->players, fn(int $acc, Player $player) => $acc + $player->countDiceWithValue($diceValue, $withPaco), 0);
    }

    public function isPalefico(): bool
    {
        return array_reduce($this->players, fn($acc, Player $p) => $acc || $p->isPalefico(), false);
    }

    public function currentPlayerName(): string
    {
        return $this->currentPlayer()->name();
    }

    private function currentPlayer(): Player
    {
        return $this->players[$this->currentPlayerIndex];
    }
}
