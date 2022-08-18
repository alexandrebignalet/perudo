<?php

namespace App\Entity\Perudo;

use InvalidArgumentException;
use JetBrains\PhpStorm\Pure;

class Bet
{
    public static int $PACO = 1;

    private string $playerName;
    private int $diceNumber;
    private DiceValue $diceValue;
    private bool $palefico;

    public function __construct(string $playerName, int $diceNumber, DiceValue $diceValue, ?Bet $previousBet = null, bool $palefico = false)
    {
        $palefico
            ? $this->validatePalefico($diceNumber, $diceValue, $previousBet)
            : $this->validate($diceNumber, $diceValue, $previousBet);

        $this->playerName = $playerName;
        $this->diceNumber = $diceNumber;
        $this->diceValue = $diceValue;
        $this->palefico = $palefico;
    }

    /**
     * @return string
     */
    public function playerName(): string
    {
        return $this->playerName;
    }

    /**
     * @return int
     */
    public function diceNumber(): int
    {
        return $this->diceNumber;
    }

    /**
     * @return int
     */
    public function diceValue(): DiceValue
    {
        return $this->diceValue;
    }

    private function validate(int $currentDiceNumber, DiceValue $currentDiceValue, ?Bet $previousBet): void
    {
        $minimumDiceNumber = $this->minimumDiceNumber($previousBet, $currentDiceValue instanceof Paco);
        $allowedDiceValueRange = $this->allowedDiceValueRange($previousBet);

        if ($currentDiceNumber < $minimumDiceNumber) {
            throw new InvalidArgumentException("Tu dois miser un nombre minimum de $minimumDiceNumber dé!");
        }

        if (!in_array($currentDiceValue->value(), $allowedDiceValueRange)) {
            $var = implode($allowedDiceValueRange);
            throw new InvalidArgumentException("Tu dois annoncer une valeur compris dans $var!");
        }

        if (!is_null($previousBet) && $currentDiceNumber == $previousBet->diceNumber() && $currentDiceValue->hasSameValue($previousBet->diceValue())) {
            throw new InvalidArgumentException("Tu dois augmenter la valeur ou le nombre de dé!");
        }
    }

    #[Pure] private function allowedDiceValueRange(?Bet $previousBet): array
    {
        if (is_null($previousBet)) {
            return range(2, 6);
        }

        $range = range($previousBet->diceValue()->value(), 6);
        $range[] = Paco::$VALUE;
        return $range;
    }

    #[Pure] private function minimumDiceNumber(?Bet $previousBet, bool $isPacoBet): int
    {
        if (is_null($previousBet)) {
            return 1;
        }
        if ($isPacoBet) {
            return $previousBet->minimumPacoDiceNumber($previousBet->diceValue() instanceof Paco);
        }

        return $previousBet->diceNumber();
    }

    private function minimumPacoDiceNumber(bool $previousBetWasPaco): int
    {
        if ($previousBetWasPaco) {
            return $this->diceNumber + 1;
        }
        return round($this->diceNumber / 2);
    }

    private function validatePalefico(int $diceNumber, DiceValue $diceValue, ?Bet $previousBet)
    {
        if (is_null($previousBet)) {
            return;
        }

        if (!$diceValue->hasSameValue($previousBet->diceValue())) {
            throw new InvalidArgumentException("Tu ne peux pas changer la valeur durant le palefico");
        }
    }


}
