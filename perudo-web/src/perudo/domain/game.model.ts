import { UserModel } from './user.model';

export class ActivePlayerModel {
  static fromSnapshot(activePlayer: any): ActivePlayerModel {
    return new ActivePlayerModel(
      activePlayer.dices,
      activePlayer.isPalefico,
      activePlayer.name,
    );
  }

  constructor(public dices: number[],
    public isPalefico: boolean,
    public name: string) {
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

export class BetModel {
  // eslint-disable-next-line @typescript-eslint/no-unused-vars
  constructor(public diceNumber: number, public diceValue: number, playerName: string) {
  }

  static fromSnapshot(lastBet: any): BetModel | undefined {
    if (!lastBet) return undefined;
    return new BetModel(
      lastBet.diceNumber,
      lastBet.diceValue,
      lastBet.playerName,
    );
  }
}

export class GameModel {
  private static USER_GAME_ID_SEPARATOR = '/$_perudo_$/';

  constructor(public id: string,
    public userGameIds: string[],
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
      BetModel.fromSnapshot(snapshot.lastBet),
    );
  }

  static nameOf(userGameId: string) {
    return userGameId.split(GameModel.USER_GAME_ID_SEPARATOR)[1];
  }

  static idOf(userGameId: string) {
    return userGameId.split(GameModel.USER_GAME_ID_SEPARATOR)[0];
  }

  contains(currentUser: UserModel): boolean {
    return !!this.userGameIds.find(name => name.includes(currentUser.id));
  }


  isStarted(): boolean {
    return !(this.turn == null);
  }

  allowPacoBet() {
    return !(this.lastBet == null);
  }

  isCurrentPlayer(userId: string | undefined) {
    if (!userId) return false;
    return this.turn?.current.includes(userId);
  }

  findActivePlayer(userId: string | undefined) {
    if (!userId) return undefined;
    return this.turn?.activePlayers.find((player) => player.name.includes(userId));
  }

  diceCount(): number | undefined {
    return this.turn?.activePlayers.reduce((acc, player) => acc + player.dices.length, 0);
  }

  canStart(): boolean {
    return this.userGameIds.length >= 2;
  }

  isOver() {
    return !!this.winner;
  }
}
