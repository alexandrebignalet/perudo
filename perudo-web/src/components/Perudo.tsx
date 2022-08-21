import React, { useCallback, useEffect, useState } from 'react';
import { GameModel } from '../perudo/domain/game.model';
import { useParams } from 'react-router-dom';
import { Bet } from './Bet';
import { PerudoRepository } from '../perudo/infra/perudo.repository';
import { FirebaseRepository } from '../perudo/infra/firebase.repository';
import { NewBet } from './NewBet';
import { UserModel } from '../perudo/domain/user.model';
import { toast } from 'react-toastify';

interface Props {
  perudoRepository: PerudoRepository
  projectionRepository: FirebaseRepository
  currentUser: UserModel | undefined
}

export const Perudo: React.FC<Props> = ({ perudoRepository, projectionRepository, currentUser }) => {
  const { id: gameId } = useParams<{ id: string }>();
  const [game, setGame] = useState<GameModel | undefined>(undefined);
  const toastIds = React.useRef<string[]>([]);

  const alertOnStateChange = (newGameState: GameModel | undefined, prevGameState: GameModel | undefined) => {
    if (newGameState?.diceCount() === prevGameState?.diceCount()) return;
    prevGameState?.turn?.activePlayers.forEach((oldActivePlayerState) => {
      const newActivePlayerState = newGameState?.findActivePlayer(oldActivePlayerState.name);
      if (newActivePlayerState == null) {
        toast(`${oldActivePlayerState.name} perd :thumbsdown:`);
        return;
      }

      if (newActivePlayerState.dices.length < oldActivePlayerState.dices.length) {
        const toastId = `loose-dice-${oldActivePlayerState.name}`;
        const message = `${oldActivePlayerState.name} perd un dé :thumbsdown:`;
        if (!toastIds.current.includes(toastId)) {
          toastIds.current.push(toastId);
          toast(message, { toastId });
        }
      }
    });

    if (newGameState?.winner) {
      toast(`${newGameState.winner} gagne :hooray:`);
    }
  };

  const onGameUpdated = (newGameState: GameModel | undefined) => {
    return setGame((prevGameState: GameModel | undefined) => {
      alertOnStateChange(newGameState, prevGameState);
      return newGameState;
    });
  };

  useEffect(() => {
    if (!gameId) return;
    projectionRepository.game(gameId, onGameUpdated);
  }, [projectionRepository, gameId, onGameUpdated]);

  const start = useCallback(async () => {
    if (!game) return;
    await perudoRepository.start(game.id);
  }, [game, perudoRepository]);

  const contest = useCallback(async () => {
    if (!game) return;
    await perudoRepository.contestLastBet(game.id);
  }, [game, perudoRepository]);

  return (<div>
            <pre>{JSON.stringify(game)}</pre>

            {game?.isStarted() && (<>
                    <ul>
                        {game.turn?.activePlayers.map((player) => <li
                            key={player.name}>{player.name} {game?.isCurrentPlayer(player.name) &&
                            <span>*</span>}</li>)}
                    </ul>

                    <Bet bet={game?.lastBet}/>

                    {game?.isCurrentPlayer(currentUser?.id) && (<>
                        <NewBet game={game} perudoRepository={perudoRepository}/>

                        {!((game?.lastBet) == null) && <button type="button" onClick={contest}>Tu ments</button>}
                    </>)}

                    <ul>
                        {game?.findActivePlayer(currentUser?.id)?.dices.map((dice, index) => <li
                            key={`${index}-${dice}`}>{dice === 1 ? 'PACO' : dice}</li>)}
                    </ul>
                </>
            )}

            {!game?.isStarted() && (<>
                <p>Game not started</p>
                <button type="button" onClick={start}>Démarrer</button>
            </>)}

        </div>
  );
};
