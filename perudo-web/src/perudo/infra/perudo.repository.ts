import {toast} from "react-toastify";

export class PerudoRepository {

    constructor(private backEndUrl: string) {
    }

    async create() {
        const response = await fetch(`${this.backEndUrl}/games`, {
            method: 'POST',
            credentials: "include",
            headers: {'Content-Type': 'application/json'},
            mode: 'cors',
        })

        if (!response.ok) {
            await PerudoRepository.handleException(response);
            throw new Error("Fail to create game");
        }
    }

    async join(gameId: string) {
        const response = await fetch(`${this.backEndUrl}/games/${gameId}/join`, {
            method: 'POST',
            credentials: "include",
            headers: {'Content-Type': 'application/json'},
            mode: 'cors'
        })

        if (!response.ok) {
            await PerudoRepository.handleException(response);
            throw new Error("Fail to join game - " + gameId);
        }
    }

    async start(gameId: string): Promise<string> {
        const response = await fetch(`${this.backEndUrl}/games/${gameId}/start`, {
            method: 'POST',
            credentials: "include",
            headers: {'Content-Type': 'application/json'},
            mode: 'cors'
        })

        const body = await response.json();

        if (!response.ok) {
            await PerudoRepository.handleException(response);
            throw new Error("Fail to start a game" + body);
        }

        return body.id;
    }

    async bet(gameId: string, diceNumber: number, diceValue: number) {
        const response = await fetch(`${this.backEndUrl}/games/${gameId}/bet`, {
            method: 'POST',
            credentials: "include",
            headers: {'Content-Type': 'application/json'},
            mode: 'cors',
            body: JSON.stringify({
                number: diceNumber,
                value: diceValue
            })
        })

        if (!response.ok) {
            await PerudoRepository.handleException(response);
            throw new Error("Fail to bet on game - " + JSON.stringify({diceNumber, diceValue, gameId}));
        }
    }

    async contestLastBet(gameId: string) {
        const response = await fetch(`${this.backEndUrl}/games/${gameId}/contest`, {
            method: 'POST',
            credentials: "include",
            headers: {'Content-Type': 'application/json'},
            mode: 'cors',
        })

        if (!response.ok) {
            await PerudoRepository.handleException(response);
            throw new Error("Fail to contest on game - " + JSON.stringify({gameId}));
        }
    }

    private static async handleException(response: Response) {
        const body = await response.json();
        let errorMessage = `${body.exception.message}`;
        toast(errorMessage, {type: 'error', icon: "🦄"});
    }
}
