<?php

namespace App\Tests;

use App\Entity\Perudo;
use App\Entity\Player;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class PerudoTest extends TestCase
{
    public function test_should_allow_a_player_to_join_the_game(): void
    {
        // GIVEN
        $game = new Perudo();

        // WHEN
        $game->join("francis");


        // THEN
        $this->assertEquals(1, $game->playersCount());
        $expected = new Player("francis");
        $this->assertEquals($expected->name(), $game->players()[0]->name());
    }

    public function test_should_not_allow_two_players_with_the_same_name(): void
    {
        // GIVEN
        $this->expectException(InvalidArgumentException::class);
        $game = new Perudo();
        $game->join("francis");

        // WHEN
        $game->join("francis");

        // THEN
        $this->assertEquals(1, $game->playersCount());
    }

    public function test_should_not_allow_more_than_6_players(): void
    {
        $this->expectException(InvalidArgumentException::class);

        // GIVEN
        $game = new Perudo();
        $game->join("jean");
        $game->join("francis");
        $game->join("patrick");
        $game->join("jeanine");
        $game->join("marie");
        $game->join("hugues");

        // WHEN
        $game->join("popol");

        // THEN
        $this->assertEquals(6, $game->playersCount());
    }

    public function test_should_not_start_the_game_with_less_than_two_players(): void
    {
        $this->expectException(InvalidArgumentException::class);

        // GIVEN
        $game = new Perudo();
        $game->join("jean");

        // WHEN
        $game->start();
    }

    public function test_should_give_5_dices_to_each_new_player()
    {
        // GIVEN
        $game = new Perudo();

        // WHEN
        $game->join("francis");

        // THEN
        $this->assertEquals(5, $game->players()[0]->diceCount());
    }

    public function test_should_expose_current_player_after_start_of_game()
    {
        // GIVEN
        $game = new Perudo();
        $game->join("yoan");
        $game->join("lajuste");

        // WHEN
        $game->start();

        // THEN
        $playersNames = array_map(function(Player $player): string { return $player->name(); }, $game->players());
        $this->assertTrue(in_array($game->currentPlayerName(), $playersNames));
    }

    public function test_should_randomize_player_dice_on_join()
    {
        // GIVEN
        $game = new Perudo();

        // WHEN
        $game->join("yoan");
        $game->join("lajuste");

        // THEN
        $yoan = $game->players()[0];
        $lajuste = $game->players()[1];
        $this->assertNotEquals($yoan->dices(), $lajuste->dices());
    }
}
