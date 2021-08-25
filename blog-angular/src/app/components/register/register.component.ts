
import { Component, OnInit } from '@angular/core';
import { User } from '../../models/user';
import { UserService } from '../../services/user.service';

@Component({
  selector: 'register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css'],
  providers: [UserService]
})
export class RegisterComponent implements OnInit {
  public page_title: string;
  public user: User;

  constructor(
    private _userService: UserService
  ) {
    this.page_title = 'Regístrate.';
    this.user = new User ('','','ROLE_USER','','','','');

    }
   

  ngOnInit(): void {
    
  }

  onSubmit(form: any){
    this._userService.register(this.user).subscribe(
      response => {
        console.log(response);

        form.reset();
      },
      error => {
        console.log(error);
      }
    );
  }

}
