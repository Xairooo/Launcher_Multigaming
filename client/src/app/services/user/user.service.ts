import { Injectable } from '@angular/core';
import { HttpService } from '../http.service';

export interface UserDTO {
  name: string;
  age: number;
  email: string;
}

@Injectable({
  providedIn: 'root'
})
export class UserService {

  constructor(private httpService: HttpService) { }

  getCurrentUser(): Promise<UserDTO> {
    return this.httpService.get<UserDTO>('/user');
  }
}
