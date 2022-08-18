<?php

namespace App\Tests;

use App\Entity\Perudo\Perudo;
use App\Entity\Perudo\Player;

class Helper
{
    public static function otherPlayerThanCurrent(Perudo $game): Player
    {
        $notCurrentPlayers = array_filter($game->turn()->activePlayers(), function (Player $player) use ($game) {
            return $player->name() !== $game->currentPlayerName();
        });
        return array_pop($notCurrentPlayers);
    }

    public static function findCurrentPlayer(Perudo $game): Player
    {
        return $game->turn()->current();
    }

    public static function findPlayerByName(Perudo $game, string $name): Player
    {
        $currentPlayers = array_filter($game->turn()->activePlayers(), fn(Player $player) => $player->name() == $name);
        return array_pop($currentPlayers);
    }
}
