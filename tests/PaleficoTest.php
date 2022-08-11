<?php

namespace App\Tests;

use App\Entity\Paco;
use App\Entity\Perudo;
use App\Entity\Player;
use App\Service\DiceLauncher;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class PaleficoTest extends TestCase
{
    public function test_should_enter_in_palefico_mode_when_one_player_reaches_one_remaining_dice(): void
    {
        // GIVEN
        $game = $this->givenAGameInPalefico();
        $game->bet($game->currentPlayerName(), 2, 4);

        // THEN
        $this->assertEquals($game->turn()->isPalefico(), true);
    }

    public function test_should_not_allow_next_player_to_change_the_chosen_value_of_the_first_player(): void
    {
        $this->expectException(InvalidArgumentException::class);

        // GIVEN
        $game = $this->givenAGameInPalefico();
        $game->bet($game->currentPlayerName(), 2, 4);

        // WHEN
        $game->bet($game->currentPlayerName(), 2, 5);
    }

    public function test_should_allow_first_player_to_start_at_paco(): void
    {
        // GIVEN
        $game = $this->givenAGameInPalefico();

        // WHEN
        $game->bet($game->currentPlayerName(), 2, Paco::$VALUE);

        // THEN
        $this->assertEquals($game->lastBet()->diceValue(), new Paco());
    }

    public function test_should_not_consider_paco_as_joker(): void
    {
        // GIVEN
        $game = $this->givenAGameInPalefico();
        $looserName = $game->currentPlayerName();
        $game->bet($looserName, 2, 6);

        // WHEN
        $game->contestLastBet($game->currentPlayerName());

        // THEN
        $this->assertFalse(array_search($looserName, array_map(fn($p) => $p->name(), $game->turn()->activePlayers())));
    }

    public function test_should_end_if_no_one_else_should_enter_in_palefico(): void
    {
        // GIVEN
        $game = $this->givenAGameInPalefico();
        $game->bet($game->currentPlayerName(), 1, 1);

        // WHEN
        $game->bet($game->currentPlayerName(), 2, 1);
        $game->contestLastBet($game->currentPlayerName());

        // THEN
        $this->assertEquals($game->turn()->isPalefico(), false);
    }

    private function givenAGameInPalefico(): Perudo
    {
        $game = new Perudo(new class implements DiceLauncher {
            public function launch(int $diceCount): array
            {
                if ($diceCount === Player::$START_DICES_COUNT) {
                    return [1, 1, 1];
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
        $game->bet($game->currentPlayerName(), 20, 4);
        $game->contestLastBet($game->currentPlayerName());
        return $game;
    }
}
