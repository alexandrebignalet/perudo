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

    public static function of(string $playerName, int $diceNumber, DiceValue $diceValue, ?Bet $previousBet = null, bool $palefico = false)
    {
        $palefico
            ? Bet::validatePalefico($diceValue, $previousBet)
            : Bet::validate($diceNumber, $diceValue, $previousBet);

        return new Bet($playerName, $diceNumber, $diceValue);
    }

    public function __construct(string $playerName, int $diceNumber, DiceValue $diceValue)
    {
        $this->playerName = $playerName;
        $this->diceNumber = $diceNumber;
        $this->diceValue = $diceValue;
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

    private static function validate(int $currentDiceNumber, DiceValue $currentDiceValue, ?Bet $previousBet): void
    {
        $minimumDiceNumber = Bet::minimumDiceNumber($previousBet, $currentDiceValue instanceof Paco);
        $allowedDiceValueRange = Bet::allowedDiceValueRange($previousBet);

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

    #[Pure] private static function allowedDiceValueRange(?Bet $previousBet): array
    {
        if (is_null($previousBet)) {
            return range(2, 6);
        }

        $range = range($previousBet->diceValue()->value(), 6);
        $range[] = Paco::$VALUE;
        return $range;
    }

    #[Pure] private static function minimumDiceNumber(?Bet $previousBet, bool $isPacoBet): int
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

    private static function validatePalefico(DiceValue $diceValue, ?Bet $previousBet)
    {
        if (is_null($previousBet)) {
            return;
        }

        if (!$diceValue->hasSameValue($previousBet->diceValue())) {
            throw new InvalidArgumentException("Tu ne peux pas changer la valeur durant le palefico");
        }
    }


}
