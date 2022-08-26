<?php

namespace App\Entity\Perudo;

use App\Service\DiceLauncher;

class PlayerTurn
{
    private int $current;
    private array $activePlayers;
    private DiceLauncher $diceLauncher;

    public static function init(array $playersNames, DiceLauncher $launcher): PlayerTurn
    {
        $players = array_map(fn(string $name) => Player::init($name, Player::$START_DICES_COUNT, false, $launcher), $playersNames);
        return new PlayerTurn(0, $players, $launcher);
    }

    public function __construct(int $current, array $activePlayers, DiceLauncher $diceLauncher)
    {
        $this->current = $current;
        $this->activePlayers = $activePlayers;
        $this->diceLauncher = $diceLauncher;
    }

    public function current(): Player
    {
        return $this->activePlayers[$this->current];
    }

    public function goNext(): void
    {
        $this->current = $this->nextIndex();
    }

    public function next(): Player
    {
        return $this->activePlayers[$this->nextIndex()];
    }

    public function goPrev(): void
    {
        $this->current = $this->prevIndex();
    }

    public function prev(): Player
    {
        return $this->activePlayers[$this->prevIndex()];
    }

    public function resolveContest(Bet $lastBet)
    {
        $isContestSucceeded = $lastBet->diceNumber() > $this->countAllDicesWithLastBetValue($lastBet->diceValue());

        $looserName = $isContestSucceeded ? $this->prev()->name() : $this->current()->name();
        $playersWithUpToDateDices = array_map(fn(Player $player): Player => $looserName == $player->name()
            ? $player->looseDice($this->diceLauncher)
            : $player->rerollDices($this->diceLauncher), $this->activePlayers);
        $this->activePlayers = array_values(array_filter($playersWithUpToDateDices, fn(Player $player) => $player->diceCount() > 0));

        if ($isContestSucceeded) {
            $this->goPrev();
        }
    }

    private function countAllDicesWithLastBetValue(DiceValue $diceValue): int
    {
        return array_reduce(
            $this->activePlayers,
            fn(int $acc, Player $player) => $acc + $player->countDiceWithValue($diceValue, !$this->isPalefico()),
            0);
    }

    private function prevIndex(): int
    {
        return $this->current === 0 ? $this->count() - 1 : $this->current - 1;
    }

    public function isPalefico(): bool
    {
        return array_reduce($this->activePlayers, fn($acc, Player $p) => $acc || $p->isPalefico(), false);
    }

    public function activePlayers(): array
    {
        return $this->activePlayers;
    }

    public function winner()
    {
        if ($this->count() > 1) return null;
        return $this->current()->name();
    }

    /**
     * @return int
     */
    public function nextIndex(): int
    {
        return $this->current === $this->count() - 1 ? 0 : $this->current + 1;
    }

    public function count(): int
    {
        return count($this->activePlayers);
    }
}
