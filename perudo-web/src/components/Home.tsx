import React, { useEffect, useState } from 'react';
import { GameModel } from '../perudo/domain/game.model';
import { PerudoRepository } from '../perudo/infra/perudo.repository';
import { FirebaseRepository } from '../perudo/infra/firebase.repository';
import { useNavigate } from 'react-router-dom';
import { UserService } from '../perudo/infra/user.service';

type Props = {
  userService: UserService;
  perudoRepository: PerudoRepository;
  projectionRepository: FirebaseRepository;
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
                    <label>Choisis un nom</label>
                    <input type="text" placeholder="entre ton nom" value={userName}
                           onChange={(event) => setUserName(event.target.value)}/>

                    <button type="button" onClick={createUser} disabled={!userName}>Go</button>
                </div>
            )
        }
    </>;
};
