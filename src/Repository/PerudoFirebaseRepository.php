<?php

namespace App\Repository;

use App\Entity\GameId;
use App\Entity\Perudo\Perudo;
use App\Entity\Perudo\Player;
use Kreait\Firebase\Contract\Database;

class PerudoFirebaseRepository
{
    private Database $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }


    /**
     * @throws \Kreait\Firebase\Exception\DatabaseException
     */
    public function project(GameId $gameId, Perudo $perudo)
    {
        $this->database->getReference("games/" . $gameId->value())->set([
            'id' => $gameId->value(),
            'winner' => $perudo->winner(),
            'turn' => is_null($perudo->turn()) ? [] : [
                'current' => $perudo->turn()->current(),
                'isPalefico' => $perudo->turn()->isPalefico(),
                'prev' => $perudo->turn()->prev(),
                'activePlayers' => array_map(function (Player $player) {
                    return [
                        'isPalefico' => $player->isPalefico(),
                        'name' => $player->name(),
                        'dices' => $player->dices()
                    ];
                }, $perudo->turn()->activePlayers()),
            ],
            'playersNames' => $perudo->playersNames(),
            'lastBet' => is_null($perudo->lastBet()) ? [] : [
                'diceValue' => $perudo->lastBet()->diceValue(),
                'diceNumber' => $perudo->lastBet()->diceNumber(),
                'playerName' => $perudo->lastBet()->playerName(),
            ]
        ]);
    }
}
