import React from 'react';
import { GameModel } from '../perudo/domain/game.model';
import { UserModel } from '../perudo/domain/user.model';

type Props = { game: GameModel };
export const PlayerList: React.FC<Props> = ({ game }) => {

  return <>
        {game.userGameIds.map((userGameId) =>
            <span key={userGameId}>
                {UserModel.emoji(userGameId)}
                {' '}
                {GameModel.nameOf(userGameId)}
                {game.userGameIds.indexOf(userGameId) === game.userGameIds.length - 1 ? '' : ' | '}
            </span>)
        }
    </>;

};
