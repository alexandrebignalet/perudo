<?php

namespace App\Tests;

use App\Entity\Perudo;
use App\Entity\Player;

class Helper
{
    public static function otherPlayerThanCurrent(Perudo $game): Player
    {
        $notCurrentPlayers = array_filter($game->players(), function (Player $player) use ($game) {
            return $player->name() !== $game->currentPlayerName();
        });
        return array_pop($notCurrentPlayers);
    }

    public static function findCurrentPlayer(Perudo $game): Player
    {
        $currentPlayers = array_filter($game->players(), fn(Player $player) => $player->name() == $game->currentPlayerName());
        return array_pop($currentPlayers);
    }

    public static function findCurrentPlayerByName(Perudo $game, string $name): Player
    {
        $currentPlayers = array_filter($game->players(), fn(Player $player) => $player->name() == $name);
        return array_pop($currentPlayers);
    }
}
