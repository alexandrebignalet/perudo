import {UserRepository} from "../infra/user.repository";
import {UserModel} from "../domain/user.model";

export class CurrentUserQuery {

    constructor(private repository: UserRepository) {
    }

    query(): UserModel | undefined {
        return this.repository.getStoredUser();
    }
}
