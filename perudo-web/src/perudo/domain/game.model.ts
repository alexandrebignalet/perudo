import {UserModel} from "./user.model";

export class GameModel {
    constructor(public id: string,
                public playersNames: string[],
                public turn?: PlayerTurn,
                public lastBet?: Bet) {
    }

    static fromSnapshot(snapshot: any): GameModel {
        return new GameModel(
            snapshot.id,
            snapshot.playersNames || [],
            PlayerTurn.fromSnapshot(snapshot.turn),
            Bet.fromSnapshot(snapshot.lastBet)
        );
    }

    contains(currentUser: UserModel): boolean {
        return !!this.playersNames.find(name => name === currentUser.id)
    }
}

export class PlayerTurn {
    constructor(public activePlayers: ActivePlayer[],
                public current: string,
                public isPalefico: boolean,
                public prev: string) {
    }

    static fromSnapshot(turn: any): PlayerTurn | undefined {
        if (!turn) return undefined;
        return new PlayerTurn(
            turn.activePlayers.map((player: any) => ActivePlayer.fromSnapshot(player)),
            turn.current,
            turn.isPalefico,
            turn.prev,
        );
    }
}

export class ActivePlayer {

    static fromSnapshot(activePlayer: any): ActivePlayer {
        return new ActivePlayer(
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

export class Bet {
    constructor(public diceNumber: number, public diceValue: number, playerName: string) {
    }

    static fromSnapshot(lastBet: any): Bet | undefined {
        if (!lastBet) return undefined;
        return new Bet(
            lastBet.diceNumber,
            lastBet.diceValue,
            lastBet.playerName
        );
    }
}

