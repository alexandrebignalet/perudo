import React from 'react';
import { BetModel } from '../perudo/domain/game.model';
import { BetStyle, DiceNumber, PerudoButtonText, Row, Typography } from '../Styles';

type Props = {
  bet?: BetModel;
};


export const Bet: React.FC<Props> = ({ bet }) => {
  // @ts-ignore
  const dotNumbers = [...Array(bet?.diceValue).keys()];
  const diceValueClasses = ['first-face', 'second-face', 'third-face', 'forth-face', 'fifth-face', 'sixth-face'];
  const diceValueClass = bet && diceValueClasses[bet.diceValue - 1];

  return (<BetStyle>
        <Row>

            <DiceNumber>
                <Typography size={'xl'} bold>
                    <PerudoButtonText size={'xl'}>{bet?.diceNumber || '-'}</PerudoButtonText>
                </Typography>
            </DiceNumber>

            <div className={`dice ${diceValueClass}`}>
                {dotNumbers.map((y) => {
                  return <div className={'dot'} key={y}/>;
                })}
            </div>

        </Row>
    </BetStyle>)
  ;
};
