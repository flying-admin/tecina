import { Component, OnInit } from '@angular/core';
import { TecinaApiService } from "../../services/tecina-api.service";

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styles: []
})
export class HomeComponent implements OnInit {

  constructor( public _tecinaApi:TecinaApiService ) {
    this._tecinaApi.getHighlights();

  }

  

  ngOnInit() {
  }

}
