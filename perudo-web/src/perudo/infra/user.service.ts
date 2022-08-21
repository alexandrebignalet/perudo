import { UserRepository } from './user.repository';
import { UserModel } from '../domain/user.model';

export class UserService {
  private currentUser?: UserModel = undefined;

  constructor(private readonly userRepository: UserRepository) {
    this.currentUser = userRepository.getStoredUser();
  }

  getCurrentUser(): UserModel | undefined {
    return this.currentUser;
  }

  createUser(name: string): Promise<UserModel> {
    return this.userRepository.create(name)
      .then(user => {
        this.currentUser = user;
        return user;
      });
  }
}
