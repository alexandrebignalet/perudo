<?php

namespace App\Entity\Perudo;

use InvalidArgumentException;

class DiceValue
{
    private int $value;

    public static function of(int $diceValue)
    {
        if ($diceValue === Paco::$VALUE) {
            return new Paco();
        }
        return new DiceValue($diceValue);
    }

    protected function __construct(int $value)
    {
        if ($value < 1 || $value > 6) {
            throw new InvalidArgumentException("Valeur de dé invalide: $value. (1-6)");
        }

        $this->value = $value;
    }

    /**
     * @return int
     */
    public function value(): int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }

    public function hasSameValue(DiceValue $other): bool
    {
        return $other == $this;
    }

    public function equalsCount(int $value, bool $withPaco): bool
    {
        if ($withPaco) {
            return $value == Paco::$VALUE || $value == $this->value;
        }

        return $value == $this->value;
    }
}
