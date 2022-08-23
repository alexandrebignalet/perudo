import React, { useCallback, useEffect, useState } from 'react';
import { GameModel } from '../perudo/domain/game.model';
import { useNavigate, useParams } from 'react-router-dom';
import { Bet } from './Bet';
import { PerudoRepository } from '../perudo/infra/perudo.repository';
import { FirebaseRepository } from '../perudo/infra/firebase.repository';
import { UserActions } from './UserActions';
import { toast } from 'react-toastify';
import { UserService } from '../perudo/infra/user.service';
import { Box, Column, GamePlayerList, Palefico, PerudoButton, PerudoButtonText, Row, Typography } from '../Styles';
import { PlayerList } from './PlayerList';
import { UserModel } from '../perudo/domain/user.model';
import { Dice } from './Dice';

interface Props {
  perudoRepository: PerudoRepository
  projectionRepository: FirebaseRepository
  userService: UserService
}

export const Perudo: React.FC<Props> = ({ perudoRepository, projectionRepository, userService }) => {
  const navigate = useNavigate();
  const { id: gameId } = useParams<{ id: string }>();
  const [game, setGame] = useState<GameModel | undefined>(undefined);
  const [showDice, setShowDice] = useState<boolean>(false);
  const currentUser = userService.getCurrentUser();


  const alertOnStateChange = useCallback((newGameState: GameModel | undefined, prevGameState: GameModel | undefined) => {
    if (newGameState?.diceCount() === prevGameState?.diceCount()) return;

    prevGameState?.turn?.activePlayers.forEach((oldActivePlayerState) => {
      const newActivePlayerState = newGameState?.findActivePlayer(oldActivePlayerState.name);
      const oldPlayerName = `${UserModel.emoji(oldActivePlayerState.name)} ${GameModel.nameOf(oldActivePlayerState.name)}`;
      if (newActivePlayerState == null) {
        toast(`${oldPlayerName} sort du jeu 👎`, { position: 'top-center' });
        return;
      }

      if (newActivePlayerState.dices.length < oldActivePlayerState.dices.length) {
        const toastId = `loose-dice-${oldActivePlayerState.name}-${new Date().getSeconds()}`;
        const message = `${oldPlayerName} perd un dé 👎`;
        toast(message, { toastId, position: 'top-center' });
      }
    });

    if (newGameState?.winner) {
      const winnerName = `${UserModel.emoji(newGameState.winner)} ${GameModel.nameOf(newGameState.winner)}`;
      toast(`${winnerName} gagne 🥳 🎉 👯‍️`, { position: 'top-center' });
      setTimeout(() => navigate('/'), 5000);
      return;
    }
  }, [navigate]);

  const onGameUpdated = useCallback((newGameState: GameModel | undefined) => {
    return setGame((prevGameState: GameModel | undefined) => {
      alertOnStateChange(newGameState, prevGameState);
      return newGameState;
    });
  }, [alertOnStateChange]);

  useEffect(() => {
    if (!gameId) return;
    projectionRepository.game(gameId, onGameUpdated);
  }, [projectionRepository, gameId, onGameUpdated]);

  const start = useCallback(async () => {
    if (!game) return;
    await perudoRepository.start(game.id);
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

                    {game?.turn?.isPalefico &&
                        <Palefico><Typography size={'l'} bold>☠️ ️palefico 🏴‍☠️‍</Typography></Palefico>}

                    {game?.lastBet && <Bet bet={game?.lastBet}/>}

                    {game?.isCurrentPlayer(currentUser?.id) &&
                        <UserActions game={game} perudoRepository={perudoRepository}/>}

                    <Column>
                        <PerudoButton type="button" fullWidth
                                      onContextMenu={(e) => {
                                        e.preventDefault();
                                        e.stopPropagation();
                                        return false;
                                      }}
                                      onPointerDown={() => {
                                        setShowDice(true);
                                      }}
                                      onPointerUp={() => {
                                        setShowDice(false);
                                      }}
                                      onMouseDown={() => {
                                        setShowDice(true);
                                      }}
                                      onMouseUp={() => {
                                        setShowDice(false);
                                      }}>
                            <PerudoButtonText size={'l'}>{'👀'}</PerudoButtonText>
                        </PerudoButton>
                    </Column>
                    <Row margin={'10px 0'} minHeight={'80px'}>
                        {showDice && game?.findActivePlayer(currentUser?.id)?.dices.map((dice, index) =>
                            <Dice small diceValue={dice} key={`${index}-${dice}`}/>,
                        )}
                    </Row>
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
