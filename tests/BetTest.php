<?php

namespace App\Tests;

use App\Entity\Bet;
use App\Entity\Perudo;
use App\Entity\Player;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class BetTest extends TestCase
{
    private Perudo $game;
    private string $currentPlayerName;
    private string $nextPlayerName;

    protected function setUp(): void
    {
        $this->game = new Perudo();
        $this->game->join("yoan");
        $this->game->join("lajuste");
        $this->game->start();

        $this->currentPlayerName = $this->game->currentPlayerName();
        $this->nextPlayerName = $this->game->currentPlayerName() == "yoan" ? "lajuste" : "yoan";
    }

    public function test_should_throw_if_another_player_than_current_tries_to_bet()
    {
        // GIVEN
        $this->expectException(InvalidArgumentException::class);

        // WHEN
        $this->game->bet($this->nextPlayerName,4, 4);
    }

    public function test_should_throw_when_bet_dice_number_is_negative()
    {
        // GIVEN
        $this->expectException(InvalidArgumentException::class);

        // WHEN
        $diceNumber = -2;
        $this->game->bet($this->currentPlayerName, $diceNumber,  4);
    }

    public function test_should_throw_when_bet_dice_number_is_0()
    {
        // GIVEN
        $this->expectException(InvalidArgumentException::class);

        // WHEN
        $diceNumber = 0;
        $this->game->bet($this->currentPlayerName, $diceNumber, 4);

    }

    public function test_should_throw_when_dice_value_lower_than_2_on_first_bet()
    {
        // GIVEN
        $this->expectException(InvalidArgumentException::class);

        // WHEN
        $diceNumber = 2;
        $diceValue = 0;
        $this->game->bet($this->currentPlayerName, $diceNumber, $diceValue);
    }

    public function test_should_throw_when_dice_value_greater_than_6()
    {
        // GIVEN
        $this->expectException(InvalidArgumentException::class);

        // WHEN
        $diceNumber = 2;
        $diceValue = 7;
        $this->game->bet($this->currentPlayerName, $diceNumber, $diceValue);
    }

    public function test_should_expose_the_last_bet_after_a_valid_placed_bet()
    {
        // GIVEN
        $diceNumber = 2;
        $diceValue = 6;
        $this->game->bet($this->currentPlayerName, $diceNumber, $diceValue);

        // THEN
        $expectedLastBet = new Bet($this->currentPlayerName, $diceNumber, $diceValue);
        $this->assertEquals($this->game->lastBet(), $expectedLastBet);
    }

    public function test_should_set_next_player_as_current_player_after_a_valid_bet_placed()
    {
        // GIVEN
        $diceNumber = 2;
        $diceValue = 6;
        $this->game->bet($this->currentPlayerName, $diceNumber, $diceValue);

        // THEN
        $this->assertEquals($this->game->currentPlayerName(), $this->nextPlayerName);
    }
}
