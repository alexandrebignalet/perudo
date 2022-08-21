import {UserModel} from "./user.model";

export class GameModel {
    constructor(public id: string,
                public playersNames: string[],
                public winner?: string,
                public turn?: PlayerTurnModel,
                public lastBet?: BetModel) {
    }

    static fromSnapshot(snapshot: any): GameModel {
        return new GameModel(
            snapshot.id,
            snapshot.playersNames || [],
            snapshot.winner,
            PlayerTurnModel.fromSnapshot(snapshot.turn),
            BetModel.fromSnapshot(snapshot.lastBet)
        );
    }

    contains(currentUser: UserModel): boolean {
        return !!this.playersNames.find(name => name === currentUser.id)
    }

    isStarted(): boolean {
        return !!this.turn;
    }

    allowPacoBet() {
        return !!this.lastBet;
    }

    isCurrentPlayer(userId: string | undefined) {
        return this.turn?.current === userId;
    }

    findActivePlayer(userId: string | undefined) {
        return this.turn?.activePlayers.find((player) => player.name === userId);
    }

    diceCount(): number | undefined {
        return this.turn?.activePlayers.reduce((acc, player) => acc + player.dices.length, 0);
    }
}

export class PlayerTurnModel {
    constructor(public activePlayers: ActivePlayerModel[],
                public current: string,
                public isPalefico: boolean,
                public prev: string) {
    }

    static fromSnapshot(turn: any): PlayerTurnModel | undefined {
        if (!turn) return undefined;
        return new PlayerTurnModel(
            turn.activePlayers.map((player: any) => ActivePlayerModel.fromSnapshot(player)),
            turn.current,
            turn.isPalefico,
            turn.prev,
        );
    }
}

export class ActivePlayerModel {

    static fromSnapshot(activePlayer: any): ActivePlayerModel {
        return new ActivePlayerModel(
            activePlayer.dices,
            activePlayer.isPalefico,
            activePlayer.name
        )
    }

    constructor(public dices: number[],
                public isPalefico: boolean,
                public name: string) {
    }
}

export class BetModel {
    constructor(public diceNumber: number, public diceValue: number, playerName: string) {
    }

    static fromSnapshot(lastBet: any): BetModel | undefined {
        if (!lastBet) return undefined;
        return new BetModel(
            lastBet.diceNumber,
            lastBet.diceValue,
            lastBet.playerName
        );
    }
}

