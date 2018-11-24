import { injectable } from "inversify";
import ApiService from "../api.service";
import LoginDto from "./login.dto";
import ConfigService from "../../utils/config.service";
import CookieService from "../../utils/cookie.service";
import UserService from "../account/user/user.service";
import UserDTO from "../account/user/user.dto";

@injectable()
export default class AuthService {
  private isAuth: boolean = false;
  private isReload: boolean = false;

  constructor(
    private apiService: ApiService,
    private configService: ConfigService,
    private cookieService: CookieService,
    private userService: UserService,
  ) {
    if (cookieService.has("access_token")) {
      this.userService.get().then(() => {
        this.isAuth = true;
      });
    }
  }

  login(login: string, password: string) {
    return this.apiService
      .post<LoginDto>("/oauth/token", {
        grant_type: "password",
        client_id: this.configService.get().api.client_id,
        client_secret: this.configService.get().api.client_secret,
        username: login,
        password: password,
        scope: "*"
      })
      .then(res => {
        this.cookieService.set("access_token", res.access_token);
        this.cookieService.set("refresh_token", res.access_token);
        this.isAuth = true;
        return res;
      });
  }

  logout() {
    this.isAuth = false;
    this.cookieService.delete("access_token");
    this.cookieService.delete("refresh_token");
  }

  isAuthenticated(): boolean {
    return this.isAuth;
  }

  canReload(): boolean {
    return this.isReload === false;
  }


}
