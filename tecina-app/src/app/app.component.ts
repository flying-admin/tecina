import { Component } from '@angular/core';
import { TecinaApiService } from "./services/tecina-api.service";


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'app';
  mainMenu = false;

  constructor(  public _tecinaApi: TecinaApiService ){
    this._tecinaApi._mainMenu.subscribe(
      main_menu => this.mainMenu = main_menu
    );
  }

}
