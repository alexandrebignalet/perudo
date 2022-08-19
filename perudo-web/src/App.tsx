import React, {useCallback, useEffect, useMemo, useRef, useState} from 'react';
import './App.css';
import {FirebaseRepository} from "./perudo/infra/firebase.repository";
import {GameModel} from "./perudo/domain/game.model";
import {CreateUserCommand} from "./perudo/application/create-user.command";
import {UserRepository} from "./perudo/infra/user.repository";
import {UserModel} from "./perudo/domain/user.model";
import {AvailableGamesToJoinQuery} from "./perudo/application/available-games-to-join.query";
import {CurrentUserQuery} from "./perudo/application/current-user.query";

function App() {

    const repository = useRef(new FirebaseRepository());
    const backEndUrl: string = useMemo(() => {
        const url = process.env.REACT_APP_BACK_END_URL;
        if (!url) throw new Error('back end url must be defined')
        return url;
    }, []);
    const userRepository = new UserRepository(backEndUrl);
    const createUserUseCase = new CreateUserCommand(userRepository);
    const currentUserQuery = new CurrentUserQuery(userRepository);

    const [currentUser, setCurrentUser] = useState<UserModel | undefined>(currentUserQuery.query());
    const [userName, setUserName] = useState<string | undefined>(undefined);

    const availableGameToJoinUseCase = new AvailableGamesToJoinQuery(repository.current);
    const [games, setGames] = useState<GameModel[]>([]);

    const createUser = useCallback(() => {
        createUserUseCase.handle(userName!).then(setCurrentUser)
    }, [createUserUseCase, userName]);

    useEffect(() => {
        if (!currentUser) return;
        availableGameToJoinUseCase.query(setGames);
    }, [availableGameToJoinUseCase, currentUser])

    const join = () => {
        console.log("joined");
    }

    return (
        <div className="App">
            <h2>Perudo</h2>
            {
                currentUser && (
                    <div>
                        <h3>Hello {currentUser.name}</h3>
                        {games.map((game) =>
                            <div>
                                <span>{game.id}</span>
                                <span>{game.playersNames.length}</span>
                                {!game.contains(currentUser) &&
                                    <button onClick={join}>join</button>
                                }
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
                        <button type="button" onClick={createUser} disabled={!userName}>Go</button>
                    </div>
                )
            }
        </div>
    );
}

export default App;
