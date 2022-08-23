import React, { useEffect, useMemo, useState } from 'react';
import { GameModel } from '../perudo/domain/game.model';
import { PerudoRepository } from '../perudo/infra/perudo.repository';
import { FirebaseRepository } from '../perudo/infra/firebase.repository';
import { useNavigate } from 'react-router-dom';
import { UserService } from '../perudo/infra/user.service';
import { Box, Column, HomeLoggedIn, InputContainer, PerudoButton, PerudoButtonText, PerudoInput } from '../Styles';
import { PlayerList } from './PlayerList';

type Props = {
  userService: UserService;
  perudoRepository: PerudoRepository;
  projectionRepository: FirebaseRepository;
  setLoading: (loading: boolean) => void;
};

export const Home: React.FC<Props> = ({
  userService,
  perudoRepository,
  projectionRepository,
}) => {
  const navigate = useNavigate();
  const [currentUser, setCurrentUser] = useState(userService.getCurrentUser());
  const [userName, setUserName] = useState<string>(currentUser?.name || '');
  const [games, setGames] = useState<GameModel[]>([]);

  useEffect(() => {
    if (!currentUser) return;
    projectionRepository.games(setGames);
  }, [currentUser, projectionRepository]);

  const join = (game: GameModel) => {
    if (!currentUser) return;

    if (game.contains(currentUser)) {
      navigate(`games/${game.id}`);
      return;
    }

    return perudoRepository.join(game.id)
      .then(() => navigate(`games/${game.id}`));
  };

  const create = () => {
    perudoRepository.create()
      .then(() => projectionRepository.games(setGames));
  };

  const createUser = () => {
    userService.createUser(userName).then(setCurrentUser);
  };

  const availableGames = useMemo(() => {
    if (!currentUser) return [];
    return games.filter((game) =>
      (game.isStarted() && game.contains(currentUser))
            || (!game.isStarted()),
    );
  }, [currentUser, games]);


  return <>
        {
            currentUser && (
                <HomeLoggedIn>

                    <PerudoButton type="button" onClick={create}>
                        <PerudoButtonText size={'l'}>créer</PerudoButtonText>
                    </PerudoButton>

                    {availableGames.map((game) =>
                        <Box key={game.id} title={game.id}>
                            <div>
                                {game.isStarted()
                                  ? `👀 ${game.userGameIds.length} singes sont en jeu: `
                                  : game.userGameIds.length < 6
                                    ? game.userGameIds.length === 1
                                      ? '1 singe t\'attend: '
                                      : `${game.userGameIds.length} singes t'attendent: `
                                    : 'le bar à singes est plein: '
                                }

                                <PlayerList game={game}/>
                            </div>
                            <PerudoButton onClick={() => join(game)}>
                                <PerudoButtonText size={'m'}>rejoindre</PerudoButtonText>
                            </PerudoButton>
                        </Box>)
                    }
                </HomeLoggedIn>
            )
        }
        {
            !currentUser && (
                <>
                    <InputContainer>
                        <PerudoInput type="text" autoFocus placeholder="ton nom" value={userName}
                                     onChange={(event) => setUserName(event.target.value)}/>
                    </InputContainer>

                    <Column>
                        <PerudoButton type="button" fullWidth onClick={createUser} disabled={!userName}>
                            <PerudoButtonText size={'l'} disabled={!userName}>fini</PerudoButtonText>
                        </PerudoButton>
                    </Column>
                </>
            )
        }
    </>;
};
