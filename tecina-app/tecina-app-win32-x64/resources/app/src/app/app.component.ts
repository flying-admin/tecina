import { Component } from '@angular/core';
import { ApiService } from "./services/api.service";


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'app';
  mainMenu = false;
  currentLang: string = 'es';

  constructor(  public _api: ApiService ){
    this._api.currentLang.subscribe(
      resp => {
        this.currentLang = resp;
    });
    this._api._mainMenu.subscribe(
      main_menu => this.mainMenu = main_menu
    );
  }

}
