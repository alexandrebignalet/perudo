import {FirebaseRepository} from "../infra/firebase.repository";
import {GameModel} from "../domain/game.model";

export class AvailableGamesToJoinQuery {

    constructor(private repository: FirebaseRepository) {
    }

    query(listener: (games: GameModel[]) => void) {
        this.repository.games(listener);
    }
}
