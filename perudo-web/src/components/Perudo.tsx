import React, { useCallback, useEffect, useState } from 'react';
import { GameModel } from '../perudo/domain/game.model';
import { useParams } from 'react-router-dom';
import { Bet } from './Bet';
import { PerudoRepository } from '../perudo/infra/perudo.repository';
import { FirebaseRepository } from '../perudo/infra/firebase.repository';
import { NewBet } from './NewBet';
import { toast } from 'react-toastify';
import { UserService } from '../perudo/infra/user.service';
import { Box, Column, GamePlayerList, PerudoButton, PerudoButtonText, Typography } from '../Styles';
import { PlayerList } from './PlayerList';
import { UserModel } from '../perudo/domain/user.model';

interface Props {
  perudoRepository: PerudoRepository
  projectionRepository: FirebaseRepository
  userService: UserService
}

export const Perudo: React.FC<Props> = ({ perudoRepository, projectionRepository, userService }) => {
  const { id: gameId } = useParams<{ id: string }>();
  const [game, setGame] = useState<GameModel | undefined>(undefined);
  const [showDice, setShowDice] = useState<boolean>(false);
  const currentUser = userService.getCurrentUser();

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

  const onGameUpdated = useCallback((newGameState: GameModel | undefined) => {
    return setGame((prevGameState: GameModel | undefined) => {
      alertOnStateChange(newGameState, prevGameState);
      return newGameState;
    });
  }, []);

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
            {game?.isStarted() && (<>
                    <Box>
                        <GamePlayerList>
                            {game.turn?.activePlayers.map((player) =>
                                <li key={player.name}>
                                    {UserModel.emoji(GameModel.idOf(player.name))}
                                    {' '}
                                    {GameModel.nameOf(player.name)}
                                    {' '}
                                    {game?.isCurrentPlayer(player.name) && <Typography size={'m'}
                                                                                       shake={game?.isCurrentPlayer(currentUser?.id)}>✋</Typography>}
                                </li>)}
                        </GamePlayerList>
                    </Box>

                    <Bet bet={game?.lastBet}/>

                    {game?.isCurrentPlayer(currentUser?.id) && (<>
                        <NewBet game={game} perudoRepository={perudoRepository}/>

                        <Column>
                            {!((game?.lastBet) == null) && <PerudoButton type="button" onClick={contest}>
                                <PerudoButtonText size={'l'}>singerie!</PerudoButtonText>
                            </PerudoButton>}
                        </Column>
                    </>)}

                    <Column>
                        <PerudoButton type="button" onMouseDown={() => setShowDice(true)}
                                      onMouseUp={() => setShowDice(false)}>
                            <PerudoButtonText size={'l'}>{'voir'}</PerudoButtonText>
                        </PerudoButton>
                    </Column>
                    {showDice && <ul>
                        {game?.findActivePlayer(currentUser?.id)?.dices.map((dice, index) => <li
                            key={`${index}-${dice}`}>{dice === 1 ? 'PACO' : dice}</li>)}
                    </ul>}
                </>
            )}

            {!game?.isStarted() && (<Box>
                <p>{`${game?.userGameIds.length}
                    singe${game?.userGameIds.length === 1 ? '' : 's'}
                    présent${game?.userGameIds.length === 1 ? '' : 's'}: `}
                    {game && <PlayerList game={game}/>}
                </p>
                <PerudoButton type="button" onClick={start} disabled={!game?.canStart()}>
                    <PerudoButtonText size={'l'} disabled={!game?.canStart()}>{'let\'s gooo'}</PerudoButtonText>
                </PerudoButton>
            </Box>)}

        </div>
  );
};
