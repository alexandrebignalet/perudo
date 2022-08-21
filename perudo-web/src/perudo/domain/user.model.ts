export class UserModel {
  constructor(public id: string,
    public name: string) {
  }

  static fromSnapshot(snapshot: any): UserModel {
    return new UserModel(
      snapshot.id,
      snapshot.name,
    );
  }
}
