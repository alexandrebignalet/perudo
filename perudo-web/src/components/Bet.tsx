import React from 'react';
import { BetModel } from '../perudo/domain/game.model';
import { BetStyle, DiceNumber, PerudoButtonText, Row, Typography } from '../Styles';
import { Dice } from './Dice';

type Props = {
  bet: BetModel;
};


export const Bet: React.FC<Props> = ({ bet }) => (<BetStyle>
    <Row>

        <DiceNumber>
            <Typography size={'xl'} bold>
                <PerudoButtonText size={'xl'}>{bet.diceNumber || '-'}</PerudoButtonText>
            </Typography>
        </DiceNumber>

        <Dice diceValue={bet.diceValue}/>

    </Row>
</BetStyle>);
