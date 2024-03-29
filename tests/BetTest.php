<?php

namespace App\Tests;

use App\Entity\Perudo\Bet;
use App\Entity\Perudo\DiceValue;
use App\Entity\Perudo\Paco;
use App\Entity\Perudo\Perudo;
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
        $this->game->bet($this->nextPlayerName, 4, 4);
    }

    public function test_should_throw_when_bet_dice_number_is_negative()
    {
        // GIVEN
        $this->expectException(InvalidArgumentException::class);

        // WHEN
        $diceNumber = -2;
        $this->game->bet($this->currentPlayerName, $diceNumber, 4);
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
        $expectedLastBet = new Bet($this->currentPlayerName, $diceNumber, DiceValue::of($diceValue), null, false);
        $this->assertEquals($this->game->lastBet(), $expectedLastBet);
    }

    public function test_should_throw_when_dice_value_is_Paco_when_no_last_bet()
    {
        // GIVEN
        $this->expectException(InvalidArgumentException::class);

        // WHEN
        $diceNumber = 2;
        $diceValue = Bet::$PACO;
        $this->game->bet($this->currentPlayerName, $diceNumber, $diceValue);
    }

    public function test_should_allow_Paco_bet_when_a_last_bet_exists()
    {
        // GIVEN
        $diceNumber = 2;
        $diceValue = 2;
        $this->game->bet($this->game->currentPlayerName(), $diceNumber, $diceValue);

        // WHEN
        $this->game->bet($this->game->currentPlayerName(), $diceNumber, Bet::$PACO);

        // THEN
        $this->assertInstanceOf(Paco::class, $this->game->lastBet()->diceValue());
    }

    public function test_should_throw_on_Paco_bet_dice_number_lower_than_half_of_last_bet_dice_number()
    {
        // GIVEN
        $diceNumber = 4;
        $diceValue = 2;
        $this->game->bet($this->game->currentPlayerName(), $diceNumber, $diceValue);
        $this->expectException(InvalidArgumentException::class);

        // WHEN
        $toLowDiceNumber = 1;
        $this->game->bet($this->game->currentPlayerName(), $toLowDiceNumber, Bet::$PACO);
    }


    public function test_should_set_next_player_as_current_player_after_a_valid_bet_placed()
    {
        // GIVEN
        $diceNumber = 2;
        $diceValue = 6;
        $this->game->bet($this->currentPlayerName, $diceNumber, $diceValue);

        // THEN
        $this->assertEquals($this->game->currentPlayerName(), $this->nextPlayerName);

        // WHEN
        $newNextPlayerName = $this->currentPlayerName;
        $this->game->bet($this->game->currentPlayerName(), $diceNumber + 1, $diceValue);

        // THEN
        $this->assertEquals($this->game->currentPlayerName(), $newNextPlayerName);
    }

    public function test_should_throw_when_bet_dice_number_is_lower_than_previous_bet_dice_number_and_dice_value_did_not_change()
    {
        // GIVEN
        $this->expectException(InvalidArgumentException::class);
        $this->game->bet($this->game->currentPlayerName(), 4, 5);

        // WHEN
        $this->game->bet($this->game->currentPlayerName(), 3, 5);
    }

    public function test_should_throw_when_bet_dice_number_and_dice_value_are_increased_in_the_same_bet()
    {
        // GIVEN
        $this->expectException(InvalidArgumentException::class);
        $this->game->bet($this->game->currentPlayerName(), 4, 5);

        // WHEN
        $this->game->bet($this->game->currentPlayerName(), 5, 6);
    }

    public function test_should_throw_when_bet_is_the_same_as_previous()
    {
        // GIVEN
        $this->expectException(InvalidArgumentException::class);
        $this->game->bet($this->game->currentPlayerName(), 4, 5);

        // WHEN
        $this->game->bet($this->game->currentPlayerName(), 4, 5);
    }

    public function test_should_throw_when_bet_dice_value_is_lower_than_previous_bet_dice_value_and_dice_number_did_not_change()
    {
        // GIVEN
        $this->expectException(InvalidArgumentException::class);
        $this->game->bet($this->game->currentPlayerName(), 4, 5);

        // WHEN
        $this->game->bet($this->game->currentPlayerName(), 4, 4);
    }

    public function test_should_allow_increase_dice_number_of_previous_paco_bet()
    {
        // GIVEN
        $firstPlayerName = $this->game->currentPlayerName();
        $this->game->bet($firstPlayerName, 4, 5);
        $this->game->bet($this->game->currentPlayerName(), 2, Paco::$VALUE);

        // WHEN
        $this->game->bet($this->game->currentPlayerName(), 3, Paco::$VALUE);

        // THEN
        $this->assertEquals($this->game->lastBet()->diceValue(), new Paco());
        $this->assertEquals($this->game->lastBet()->diceNumber(), 3);
        $this->assertEquals($this->game->lastBet()->playerName(), $firstPlayerName);
    }

    public function test_should_allow_increase_both_dice_value_and_number_when_going_back_to_normal_bet_when_previous_is_paco_bet()
    {
        // GIVEN
        $firstPlayerName = $this->game->currentPlayerName();
        $this->game->bet($firstPlayerName, 4, 5);
        $this->game->bet($this->game->currentPlayerName(), 2, Paco::$VALUE);

        // WHEN
        $this->game->bet($this->game->currentPlayerName(), 5, 3);

        // THEN
        $this->assertEquals($this->game->lastBet()->diceValue(), DiceValue::of(3));
        $this->assertEquals($this->game->lastBet()->diceNumber(), 5);
        $this->assertEquals($this->game->lastBet()->playerName(), $firstPlayerName);
    }

    public function test_should_throw_when_dice_number_is_lower_than_previous_paco_bet_one()
    {
        // GIVEN
        $this->expectException(InvalidArgumentException::class);
        $this->game->bet($this->game->currentPlayerName(), 4, 5);
        $this->game->bet($this->game->currentPlayerName(), 2, Paco::$VALUE);

        // WHEN
        $this->game->bet($this->game->currentPlayerName(), 1, Paco::$VALUE);
    }

    public function test_should_throw_when_no_paco_dice_number_is_lower_than_2_times_previous_paco_bet_dice_number()
    {
        // GIVEN
        $this->expectException(InvalidArgumentException::class);
        $this->game->bet($this->game->currentPlayerName(), 1, 2);
        $this->game->bet($this->game->currentPlayerName(), 1, Paco::$VALUE);

        // WHEN
        $this->game->bet($this->game->currentPlayerName(), 1, 2);
    }
}
