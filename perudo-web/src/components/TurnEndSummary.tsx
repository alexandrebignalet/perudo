import React from 'react';
import { GameModel } from '../perudo/domain/game.model';
import { ActivePlayerList } from './Perudo';
import { UserModel } from '../perudo/domain/user.model';
import { Row } from '../Styles';
import { Bet } from './Bet';

type Props = {
  message: string;
  game: GameModel;
  currentUser?: UserModel;
};

export const TurnEndSummary: React.FC<Props> = ({ game, message, currentUser }) => {
  return <div>
        <p>{message}</p>
        <Bet bet={game.lastBet!}/>
        <Row>
            <ActivePlayerList currentUser={currentUser} game={game} showDices/>
        </Row>
    </div>;
};
