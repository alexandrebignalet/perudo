import {UserModel} from "../domain/user.model";

export class UserRepository {
    private static key = 'user';

    constructor(private backEndUrl: string) {
    }

    getStoredUser(): UserModel | undefined {
        const userString = localStorage.getItem(UserRepository.key) || undefined;
        if (!userString) return undefined;
        const userJson = JSON.parse(userString);
        return new UserModel(userJson.uuid, userJson.name);
    }

    async create(name: string) {
        const response = await fetch(`${this.backEndUrl}/users`, {
            method: 'PUT',
            headers: {'Content-Type': 'application/json'},
            mode: 'cors',
            body: JSON.stringify({
                uuid: this.getStoredUser() || 'generate_new',
                name
            })
        })

        const body = await response.json();

        if (!response.ok) {
            throw new Error("Fail to create user - " + body);
        }

        localStorage.setItem(UserRepository.key, JSON.stringify(body));

        return new UserModel(body.uuid, body.name);
    }
}