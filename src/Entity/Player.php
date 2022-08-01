<?php

namespace App\Entity;

use App\Service\DiceLauncher;

class Player
{
    public static int $START_DICES_COUNT = 5;
    private string $name;
    private array $dices;
    private bool $isPalefico;

    public function __construct(string $name, int $dicesCount, bool $isPalefico, DiceLauncher $diceLauncher)
    {
        $this->name = $name;
        $this->dices = $diceLauncher->launch($dicesCount);
        $this->isPalefico = $isPalefico;
    }

    public function rerollDices(DiceLauncher $diceLauncher): Player
    {
        return new Player($this->name, $this->diceCount(), false, $diceLauncher);
    }

    public function looseDice(DiceLauncher $diceLauncher): Player
    {
        return new Player($this->name, $this->diceCount() - 1, $this->diceCount() == 2, $diceLauncher);
    }

    public function diceCount(): int
    {
        return count($this->dices);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function dices(): array
    {
        return $this->dices;
    }

    public function countDiceWithValue(DiceValue $diceValue, bool $withoutPaco): int
    {
        return count(array_filter($this->dices, fn(int $value) => $diceValue->equalsCount($value, $withoutPaco)));
    }

    public function isPalefico()
    {
        return $this->isPalefico;
    }

}
