import {UserRepository} from "../infra/user.repository";
import {UserModel} from "../domain/user.model";

export class CreateUserCommand {

    constructor(private repository: UserRepository) {
    }

    async handle(name: string): Promise<UserModel> {
        return this.repository.create(name);
    }
}
