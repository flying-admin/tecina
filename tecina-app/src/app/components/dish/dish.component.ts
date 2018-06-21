import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { TecinaApiService } from "../../services/tecina-api.service";


@Component({
  selector: 'app-dish',
  templateUrl: './dish.component.html',
  styles: []
})
export class DishComponent implements OnInit {

  constructor(
    private _activeRoute:ActivatedRoute,
    public _tecinaApi: TecinaApiService ,
  ) { 

    this._activeRoute.params.subscribe(
      params => {console.log(params)}
    )    
  }

  ngOnInit() {
  }

}
