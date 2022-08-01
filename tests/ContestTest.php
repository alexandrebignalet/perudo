<?php

namespace App\Tests;

use App\Entity\Perudo;
use App\Service\DiceLauncher;
use App\Service\DiceLauncherImpl;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ContestTest extends TestCase
{
    public function test_should_throw_when_contest_done_by_an_other_player_than_current_player()
    {
        $this->expectException(InvalidArgumentException::class);

        // GIVEN
        $game = new Perudo();
        $game->join("yoan");
        $game->join("lajuste");
        $game->start();
        $game->bet($game->currentPlayerName(), 12, 6);
        $notCurrentPlayer = Helper::otherPlayerThanCurrent($game);

        // WHEN
        $game->contestLastBet($notCurrentPlayer->name());
    }

    public function test_should_throw_when_contest__done_without_previous_bet()
    {
        $this->expectException(InvalidArgumentException::class);

        // GIVEN
        $game = new Perudo();
        $game->join("yoan");
        $game->join("lajuste");
        $game->start();

        // WHEN
        $game->contestLastBet($game->currentPlayerName());
    }

    public function test_should_set_contested_player_as_current_player_on_contest_succeeded()
    {
        // GIVEN
        $game = new Perudo();
        $game->join("yoan");
        $game->join("lajuste");
        $game->start();
        $liarName = $game->currentPlayerName();
        $game->bet($liarName, 12, 6);

        // WHEN
        $game->contestLastBet($game->currentPlayerName());

        // THEN
        $this->assertEquals($game->currentPlayerName(), $liarName);
    }

    public function test_should_set_contender_player_as_current_player_on_contest_failed()
    {
        // GIVEN
        $game = new Perudo(diceLauncher: new class implements DiceLauncher {

            public function launch(int $_): array
            {
                return [6, 6, 6, 6, 6];
            }
        });
        $game->join("yoan");
        $game->join("lajuste");
        $game->start();

        $game->bet($game->currentPlayerName(), 10, 6);

        // WHEN
        $liarName = $game->currentPlayerName();
        $game->contestLastBet($liarName);

        // THEN
        $this->assertEquals($game->currentPlayerName(), $liarName);
    }

    public function test_should_clean_last_bet_on_after_contest()
    {
        // GIVEN
        $game = new Perudo(diceLauncher: new class implements DiceLauncher {

            public function launch(int $_): array
            {
                return [6, 6, 6, 6, 6];
            }
        });
        $game->join("yoan");
        $game->join("lajuste");
        $game->start();

        $game->bet($game->currentPlayerName(), 10, 6);

        // WHEN
        $liarName = $game->currentPlayerName();
        $game->contestLastBet($liarName);

        // THEN
        $this->assertEquals($game->lastBet(), null);
    }

    public function test_should_remove_a_dice_to_the_contest_looser_and_reroll_all_players_dices()
    {
        // GIVEN
        $diceLauncherMock = $this->getMockBuilder(DiceLauncherImpl::class)
            ->enableProxyingToOriginalMethods()
            ->setMethods(['launch'])
            ->getMock();

        $diceLauncherMock
            ->expects($this->exactly(4))
            ->method('launch')
            ->withAnyParameters();

        $game = new Perudo(diceLauncher: $diceLauncherMock);
        $game->join("yoan");
        $game->join("lajuste");
        $game->start();

        $game->bet($game->currentPlayerName(), 12, 6);

        // WHEN
        $liarName = $game->currentPlayerName();
        $game->contestLastBet($liarName);

        // THEN
        $looser = Helper::findCurrentPlayer($game);
        $this->assertEquals(count($looser->dices()), 4);
    }

    /**
     * @dataProvider provideBetContestData
     */
    public function testBetContest(array $diceLaunch, int $diceNumber, int $diceValue, bool $isGamblerLying)
    {
        // GIVEN
        $game = new Perudo(diceLauncher: new class ($diceLaunch) implements DiceLauncher {

            private array $diceLaunch;

            public function __construct($diceLaunch)
            {
                $this->diceLaunch = $diceLaunch;
            }

            public function launch(int $_): array
            {
                return $this->diceLaunch;
            }
        });
        $game->join("yoan");
        $game->join("lajuste");
        $game->start();
        $gambler = $game->currentPlayerName();
        $game->bet($game->currentPlayerName(), $diceNumber, $diceValue);

        // WHEN
        $contender = $game->currentPlayerName();
        $game->contestLastBet($contender);

        // THEN
        $this->assertEquals($game->currentPlayerName(), $isGamblerLying ? $gambler : $contender);
    }

    public function provideBetContestData(): array
    {
        return array(
            array([1, 2, 3, 4, 5], 4, 5, false),
            array([1, 1, 1, 1, 1], 10, 6, false),
            array([1, 1, 1, 1, 1], 9, 6, false),
            array([1, 1, 1, 1, 1], 11, 6, true),
        );
    }
}
