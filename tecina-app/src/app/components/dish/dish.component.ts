import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';


@Component({
  selector: 'app-dish',
  templateUrl: './dish.component.html',
  styles: []
})
export class DishComponent implements OnInit {

  constructor(
    private _activeRoute:ActivatedRoute
  ) { 

    this._activeRoute.params.subscribe(
      params => {console.log(params)}
    )
  }

  ngOnInit() {
  }

}
