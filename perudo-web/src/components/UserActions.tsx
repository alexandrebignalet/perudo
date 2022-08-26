import { GameModel } from '../perudo/domain/game.model';
import { PerudoRepository } from '../perudo/infra/perudo.repository';
import React, { useCallback, useEffect, useMemo, useState } from 'react';
import { Column, InputContainer, PerudoButton, PerudoButtonText, PerudoInput, PerudoSelectInput, Row } from '../Styles';
import { UserModel } from '../perudo/domain/user.model';

type Props = {
  game: GameModel;
  perudoRepository: PerudoRepository;
  currentUser: UserModel;
};

export const UserActions: React.FC<Props> = ({ game, perudoRepository, currentUser }) => {
  const [bet, setBet] = useState<{ value: number, number: number }>(game?.lastBet ? {
    value: game.lastBet.diceValue,
    number: game.lastBet.diceNumber,
  } : {
    value: game?.allowPacoBet() ? 1 : 2,
    number: 1,
  });

  useEffect(() => {
    if (!game.allowPacoBet() && bet.value === 1) {
      setBet({ number: bet.number, value: 2 });
    }
  }, [bet.number, bet.value, game]);

  const doBet = useCallback(() => {
    if (!game || !bet.value || !bet.number) return;
    perudoRepository.bet(game.id, bet.number, bet.value);
  }, [game, bet, perudoRepository]);

  const contest = useCallback(async () => {
    if (!game) return;
    await perudoRepository.contestLastBet(game.id);
  }, [game, perudoRepository]);

  const isPaleficoRestricted = useMemo(() => {
    let currentPlayer = game?.findActivePlayer(currentUser.id);
    return game.turn?.isPalefico ? !(currentPlayer?.isPalefico && !game?.lastBet) : false;
  }, [currentUser.id, game]);

  return <Column>
        <InputContainer>
            <PerudoInput autoFocus type="number" value={bet.number} min={0}
                         placeholder="nombre"
                         onChange={event => setBet({ number: +event.target.value, value: bet.value })}/>
            <PerudoSelectInput value={bet.value}
                               disabled={isPaleficoRestricted}
                               onChange={event => setBet({ number: bet.number, value: +event.target.value })}>
                {game?.allowPacoBet() && <option value={1}>PACO</option>}
                <option value={2}>2</option>
                <option value={3}>3</option>
                <option value={4}>4</option>
                <option value={5}>5</option>
                <option value={6}>6</option>
            </PerudoSelectInput>
        </InputContainer>
        <Row>
            <PerudoButton type="button" onClick={doBet} fullWidth>
                <PerudoButtonText size={'l'}>bet</PerudoButtonText>
            </PerudoButton>
            {!((game?.lastBet) == null) && <PerudoButton fullWidth type="button" onClick={contest}>
                <PerudoButtonText size={'l'}>singerie</PerudoButtonText>
            </PerudoButton>}
        </Row>
    </Column>
  ;
};
