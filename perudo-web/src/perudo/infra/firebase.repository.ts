import { initializeApp } from 'firebase/app';
import { connectDatabaseEmulator, Database, getDatabase, onValue, ref } from 'firebase/database';
import { GameModel } from '../domain/game.model';
import { UserModel } from '../domain/user.model';

export class FirebaseRepository {
  private readonly db: Database;

  constructor() {
    initializeApp({
      apiKey: process.env.REACT_APP_API_KEY,
      authDomain: process.env.REACT_APP_AUTH_DOMAIN,
      databaseURL: process.env.REACT_APP_DATABASE_URL,
      projectId: process.env.REACT_APP_PROJECT_ID,
      storageBucket: process.env.REACT_APP_STORAGE_BUCKET,
      messagingSenderId: process.env.REACT_APP_MESSAGING_SENDER_ID,
      appId: process.env.REACT_APP_APP_ID,
      measurementId: process.env.REACT_APP_MEASUREMENT_ID,
    });

    this.db = getDatabase();

    if (process.env.NODE_ENV === 'development') {
      try {
        connectDatabaseEmulator(this.db, 'localhost', 15000);
      } catch (e) {
      }
    }
  }

  game(gameId: string, listener: (game: GameModel) => void): void {
    const gameRefPath = `games/${gameId}`;
    const gameRef = ref(this.db, gameRefPath);
    onValue(gameRef, (snapshot) => {
      listener(GameModel.fromSnapshot(snapshot.val()));
    });
  }

  games(listener: (games: GameModel[]) => void): void {
    const gamesRefPath = 'games';
    const gamesRef = ref(this.db, gamesRefPath);
    onValue(gamesRef, (snapshot) => {
      listener(Object.values(snapshot.val() ?? []).map(GameModel.fromSnapshot));
    });
  }

  user(userId: string, listener: (user: UserModel) => void): void {
    const userRefPath = `users/${userId}`;
    const userRef = ref(this.db, userRefPath);
    onValue(userRef, (snapshot) => {
      listener(UserModel.fromSnapshot(snapshot.val()));
    });
  }
}
