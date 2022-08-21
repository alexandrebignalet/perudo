import React, { useCallback, useEffect, useRef, useState } from 'react';
import { UserRepository } from '../perudo/infra/user.repository';
import { UserModel } from '../perudo/domain/user.model';
import { GameModel } from '../perudo/domain/game.model';
import { PerudoRepository } from '../perudo/infra/perudo.repository';
import { FirebaseRepository } from '../perudo/infra/firebase.repository';
import { useNavigate } from 'react-router-dom';

type Props = {
  userRepository: UserRepository;
  perudoRepository: PerudoRepository;
  projectionRepository: FirebaseRepository;
  currentUserState: [UserModel | undefined, (user: UserModel | undefined) => void],
};

export const Home: React.FC<Props> = ({
  userRepository,
  perudoRepository,
  projectionRepository,
  currentUserState: [currentUser, setCurrentUser],
}) => {
  const navigate = useNavigate();
  const [userName, setUserName] = useState<string>(currentUser?.name || '');
  const [games, setGames] = useState<GameModel[]>([]);
  const tryLogIn = useRef(false);

  const getOrCreateUser = useCallback((userNameInput?: string) => userRepository.getOrCreate(userNameInput).then(user => {
    setCurrentUser(user);
    return user;
  }), [userRepository, setCurrentUser]);

  useEffect(() => {
    if (tryLogIn.current) return;
    tryLogIn.current = true;
    getOrCreateUser();
    projectionRepository.games(setGames);
  }, [getOrCreateUser, projectionRepository]);

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

  return <>
        {
            currentUser && (
                <div>
                    <h3>Hello {currentUser.name}</h3>

                    <button type="button" onClick={create}>Nouvelle partie</button>

                    {games.map((game) =>
                        <div key={game.id}>
                            <p>{game.id}</p>
                            <p>{game.playersNames.length}</p>
                            <button onClick={() => join(game)}>join</button>
                        </div>)
                    }
                </div>
            )
        }
        {
            !currentUser && (
                <div>
                    <label>Choisi un nom</label>
                    <input type="text" placeholder="entre ton nom" value={userName}
                           onChange={(event) => setUserName(event.target.value)}/>

                    <button type="button" onClick={() => getOrCreateUser(userName)} disabled={!userName}>Go</button>
                </div>
            )
        }
    </>;
};
