import {GameModel} from "../perudo/domain/game.model";
import {PerudoRepository} from "../perudo/infra/perudo.repository";
import React, {useCallback, useState} from "react";

type Props = {
    game: GameModel;
    perudoRepository: PerudoRepository;
}

export const NewBet: React.FC<Props> = ({game, perudoRepository}) => {
    const [bet, setBet] = useState<{ value: number, number: number }>(game?.lastBet ? {
        value: game.lastBet.diceValue,
        number: game.lastBet.diceNumber
    } : {
        value: game?.allowPacoBet() ? 1 : 2,
        number: 1
    });

    const doBet = useCallback(() => {
        if (!game || !bet.value || !bet.number) return;
        perudoRepository.bet(game.id, bet.number, bet.value);
    }, [game, bet, perudoRepository]);

    return <div>
        <label>Dice number</label>
        <input type="number" value={bet.number} min={0}
               onChange={event => setBet({number: +event.target.value, value: bet.value})}/>

        <label>Dice value</label>
        <select value={bet.value}
                onChange={event => setBet({number: bet.number, value: +event.target.value})}>
            {game?.allowPacoBet() && <option value={1}>PACO</option>}
            <option value={2}>2</option>
            <option value={3}>3</option>
            <option value={4}>4</option>
            <option value={5}>5</option>
            <option value={6}>6</option>
        </select>
        <button type="button" onClick={doBet}>Bet</button>
    </div>;
}
