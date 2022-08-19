import React, {useCallback, useEffect, useState} from "react";
import {GameModel} from "../perudo/domain/game.model";
import {PerudoRepository} from "../perudo/infra/perudo.repository";
import {FirebaseRepository} from "../perudo/infra/firebase.repository";
import {useParams} from "react-router-dom";

type Props = {
    perudoRepository: PerudoRepository;
    projectionRepository: FirebaseRepository;
}

export const Perudo: React.FC<Props> = ({perudoRepository, projectionRepository}) => {
    const {id: gameId} = useParams<{ id: string }>();
    const [game, setGame] = useState<GameModel | undefined>(undefined);

    useEffect(() => {
        if (!gameId) return;
        projectionRepository.game(gameId, setGame);
    }, [projectionRepository])

    const start = useCallback(() => {
        if (!game) return;
        perudoRepository.start(game.id);
    }, [game]);

    return (<div>
        <pre>{JSON.stringify(game)}</pre>

        {game?.isStarted() && (<>
            Game started
        </>)}

        {!game?.isStarted() && (<>
            <p>Game not started</p>
            <button type="button" onClick={start}>Démarrer</button>
        </>)}

    </div>)
}
