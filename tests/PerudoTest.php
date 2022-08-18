<?php

namespace App\Tests;

use App\Entity\Perudo\Bet;
use App\Entity\Perudo\Perudo;
use App\Entity\Perudo\Player;
use App\Service\DiceLauncher;
use App\Service\DiceLauncherImpl;
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
        $expected = new Player("francis", Player::$START_DICES_COUNT, false, new DiceLauncherImpl());
        $this->assertEquals($expected->name(), $game->playersNames()[0]);
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
        $game->join("mick");
        $game->join("ben");

        $game->start();

        // THEN
        $this->assertEquals(5, $game->turn()->activePlayers()[0]->diceCount());
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
        $this->assertTrue(in_array($game->currentPlayerName(), $game->playersNames()));
    }

    public function test_should_randomize_player_dice_on_join()
    {
        // GIVEN
        $game = new Perudo();

        // WHEN
        $game->join("yoan");
        $game->join("lajuste");
        $game->start();

        // THEN
        $aPlayer = $game->turn()->activePlayers()[0];
        $anotherPlayer = $game->turn()->activePlayers()[1];
        $this->assertNotEquals($aPlayer->dices(), $anotherPlayer->dices());
    }

    public function test_should_not_let_0_dices_player_play_anymore()
    {
        $this->expectException(InvalidArgumentException::class);

        // GIVEN
        $game = $this->givenPerudo();

        $looser = $game->currentPlayerName();
        $game->bet($looser, 20, 4);

        $followingPlayer = $game->currentPlayerName();
        $game->contestLastBet($followingPlayer);

        // WHEN
        $game->bet($looser, 20, 6);
    }

    private function givenPerudo(): Perudo
    {
        $game = new Perudo(new class implements DiceLauncher {
            public function launch(int $diceCount): array
            {
                if ($diceCount === Player::$START_DICES_COUNT) {
                    return [1, 1];
                }

                if ($diceCount == 0) {
                    return [];
                }

                return array_map(fn() => 1, range(0, $diceCount - 1));
            }
        });

        $game->join("francis");
        $game->join("ben");
        $game->join("hugues");
        $game->start();

        $game->bet($game->currentPlayerName(), 20, 4);
        $game->contestLastBet($game->currentPlayerName());

        return $game;
    }

    public function test_full_game()
    {
        $game = new Perudo(new DiceLauncherImpl());

        $game->join('jean');
        $game->join('moune');
        $game->join('matelot');
        $game->join('labruche');
        $game->join('ziil');
        $game->join('kevin');

        $game->start();

        while (is_null($game->winner())) {
            $minValue = $game->turn()->isPalefico() || !is_null($game->lastBet()) ? Bet::$PACO : 2;
            $game->bet($game->currentPlayerName(), rand(1, 30), rand($minValue, 6));
            $game->contestLastBet($game->currentPlayerName());
        }

        print_r($game);
        print_r("And the winner is " . $game->winner());
        $this->assertTrue(true);
    }
}
