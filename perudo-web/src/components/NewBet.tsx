import { GameModel } from '../perudo/domain/game.model';
import { PerudoRepository } from '../perudo/infra/perudo.repository';
import React, { useCallback, useState } from 'react';
import { InputContainer, PerudoButton, PerudoButtonText, PerudoInput, PerudoSelectInput } from '../Styles';

type Props = {
  game: GameModel;
  perudoRepository: PerudoRepository;
};

export const NewBet: React.FC<Props> = ({ game, perudoRepository }) => {
  const [bet, setBet] = useState<{ value: number, number: number }>(game?.lastBet ? {
    value: game.lastBet.diceValue,
    number: game.lastBet.diceNumber,
  } : {
    value: game?.allowPacoBet() ? 1 : 2,
    number: 1,
  });

  const doBet = useCallback(() => {
    if (!game || !bet.value || !bet.number) return;
    perudoRepository.bet(game.id, bet.number, bet.value);
  }, [game, bet, perudoRepository]);

  return <InputContainer>
        <PerudoInput autoFocus type="number" value={bet.number} min={0}
                     placeholder="nombre"
                     onChange={event => setBet({ number: +event.target.value, value: bet.value })}/>

        <PerudoSelectInput value={bet.value}
                           onChange={event => setBet({ number: bet.number, value: +event.target.value })}>
            {game?.allowPacoBet() && <option value={1}>PACO</option>}
            <option value={2}>2</option>
            <option value={3}>3</option>
            <option value={4}>4</option>
            <option value={5}>5</option>
            <option value={6}>6</option>
        </PerudoSelectInput>
        <PerudoButton type="button" onClick={doBet}>
            <PerudoButtonText size={'l'}>bet</PerudoButtonText>
        </PerudoButton>
    </InputContainer>
  ;
};
