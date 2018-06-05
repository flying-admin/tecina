import { Component, OnInit,OnDestroy } from '@angular/core';
import { TecinaApiService } from "../../../services/tecina-api.service";
import { ActivatedRoute, Router } from '@angular/router';
import { map } from 'rxjs/operators';
import 'rxjs/add/operator/map';


@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styles: []
})

export class NavbarComponent implements OnInit, OnDestroy {
  defaultLang = "es";
  currentLang = this.defaultLang;
  langs;
  categories;
  foodTypes;
  allergens;
  routeLang;

  filters = {
    category : [],
  }

  constructor( 
      public _tecinaApi:TecinaApiService ,
      private route: ActivatedRoute,
      private router: Router,
    ) { 

     this.routeLang = this.route
      .queryParams
      .subscribe(params => {
        if(params['lang']){
          console.log("params" , params);
          this.currentLang = params['lang'] ;
        }
        console.log(this.currentLang);
        localStorage.setItem('currentLang', this.currentLang);
        this.initialiseInvites();
      });

        
  }

  initialiseInvites() {
    console.log('dentro');
    // Set default values and re-fetch any data you need.
    //this.langs  = this._tecinaApi.getLanguages();
    this._tecinaApi.getLanguages().map(resp => {
      this.langs = resp;
      console.log("resp", resp);
    })
    this.categories  = this._tecinaApi.getCategories();
    this.foodTypes  = this._tecinaApi.getFoodTypes();
    this.allergens  = this._tecinaApi.getAllergens();
  }
 
  ngOnInit(){}


  ngOnDestroy() {
    if (this.routeLang) {  
      this.routeLang.unsubscribe();
   }
  }

}
