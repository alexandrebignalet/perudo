import { toast } from 'react-toastify';

export class PerudoRepository {
  constructor(private readonly backEndUrl: string, private setLoading: (loading: boolean) => void) {
  }

  async create(): Promise<void> {
    this.setLoading(true);
    const response = await fetch(`${this.backEndUrl}/games`, {
      method: 'POST',
      credentials: 'include',
      headers: { 'Content-Type': 'application/json' },
      mode: 'cors',
    })
      .finally(() => this.setLoading(false));

    if (!response.ok) {
      await PerudoRepository.handleException(response);
      throw new Error('Fail to create game');
    }
  }

  async join(gameId: string): Promise<void> {
    this.setLoading(true);

    const response = await fetch(`${this.backEndUrl}/games/${gameId}/join`, {
      method: 'POST',
      credentials: 'include',
      headers: { 'Content-Type': 'application/json' },
      mode: 'cors',
    })
      .finally(() => this.setLoading(false));


    if (!response.ok) {
      await PerudoRepository.handleException(response);
      throw new Error('Fail to join game - ' + gameId);
    }
  }

  async start(gameId: string): Promise<string> {
    this.setLoading(true);

    const response = await fetch(`${this.backEndUrl}/games/${gameId}/start`, {
      method: 'POST',
      credentials: 'include',
      headers: { 'Content-Type': 'application/json' },
      mode: 'cors',
    })
      .finally(() => this.setLoading(false));

    if (!response.ok) {
      await PerudoRepository.handleException(response);
      throw new Error('Fail to start a game');
    }

    const body = await response.json();
    return body.id;
  }

  async bet(gameId: string, diceNumber: number, diceValue: number) {
    this.setLoading(true);

    const response = await fetch(`${this.backEndUrl}/games/${gameId}/bet`, {
      method: 'POST',
      credentials: 'include',
      headers: { 'Content-Type': 'application/json' },
      mode: 'cors',
      body: JSON.stringify({
        number: diceNumber,
        value: diceValue,
      }),
    })
      .finally(() => this.setLoading(false));


    if (!response.ok) {
      await PerudoRepository.handleException(response);
      throw new Error('Fail to bet on game - ' + JSON.stringify({ diceNumber, diceValue, gameId }));
    }
  }

  async contestLastBet(gameId: string) {
    this.setLoading(true);
    const response = await fetch(`${this.backEndUrl}/games/${gameId}/contest`, {
      method: 'POST',
      credentials: 'include',
      headers: { 'Content-Type': 'application/json' },
      mode: 'cors',
    })
      .finally(() => this.setLoading(false));


    if (!response.ok) {
      await PerudoRepository.handleException(response);
      throw new Error('Fail to contest on game - ' + JSON.stringify({ gameId }));
    }
  }

  private static async handleException(response: Response): Promise<void> {
    const body: { exception: { message: string } } = await response.json();
    const errorMessage = `${body.exception.message}`;
    toast(errorMessage, { type: 'error', icon: '🦄' });
  }
}
