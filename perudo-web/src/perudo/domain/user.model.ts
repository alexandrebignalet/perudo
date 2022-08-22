import { emojis } from '../../emojis';

export class UserModel {
  constructor(public id: string, public name: string) {
  }

  static fromSnapshot(snapshot: any): UserModel {
    return new UserModel(
      snapshot.id,
      snapshot.name,
    );
  }

  // date::day determine indexOf userId uuid value if oob -> last
  // which is used as emojiIndex
  static emoji(userGameId: string): string {
    const day = new Date().getDay();
    const isNum = (n: unknown) => !isNaN(n as number);
    // @ts-ignore
    const userIdNumbers: number[] = [...userGameId].filter(isNum);
    const emojiIndex = userIdNumbers.indexOf(day) !== -1 ? userIdNumbers[day] : userIdNumbers[userIdNumbers.length - 1];
    return emojis[emojiIndex];
  }
}
