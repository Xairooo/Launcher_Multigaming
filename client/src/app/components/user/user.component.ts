import { Component, OnInit } from '@angular/core';
import { UserService } from 'src/app/services/user/user.service';
import { UserDTO } from '../../services/user/user.service';

@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.scss']
})
export class UserComponent implements OnInit {

  user: UserDTO;

  constructor(private userService: UserService) { }

  ngOnInit() {
    this.userService.getCurrentUser().then((user) => {
      this.user = user;
    });
  }

}
