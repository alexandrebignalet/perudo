import React from "react";
import styled from "styled-components";
import {BetModel} from "../perudo/domain/game.model";

type Props = {
    bet?: BetModel;
}


const Style = styled.div`
    padding: 4em;
    background: papayawhip;
    display: flex;
`;

const DiceNumber = styled.div`
    font-size: 1.5em;
    text-align: center;
`;

const DiceValue = styled.div`
    border-left: 2px solid palevioletred;
    font-size: 1.5em;
    text-align: center;
`;

export const Bet: React.FC<Props> = ({bet}) => {
    return (<Style>
        <DiceNumber>{bet?.diceNumber || "-"}</DiceNumber>
        <DiceValue>{bet?.diceValue || "-"}</DiceValue>
    </Style>)
}
