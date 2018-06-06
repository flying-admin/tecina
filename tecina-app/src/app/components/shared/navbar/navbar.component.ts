import { Component, OnInit,OnDestroy } from '@angular/core';
import { TecinaApiService } from "../../../services/tecina-api.service";
import { ActivatedRoute, Router } from '@angular/router';
import { map } from 'rxjs/operators';


@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styles: []
})

export class NavbarComponent implements OnInit, OnDestroy {
  //defaultLang = "es";
  currentLang;
  langs;
  categories;
  foodTypes;
  allergens;
  dishes;
  //routeLang;

  translations = {
   nav: {
     allergen_title: {
       es:"Tipo de Alérgeno",
       fr:"Tipo de Alérgeno - FR"
     },
     food_types_title: {
       es:"Tipo de comida",
       fr:"Tipo de comida - FR"
     },
     wine_title: {
       es:"Carta de Vinos",
       fr:"Carta de Vinos - FR"
     },
    menu_title: {
       es:"Menus",
       fr:"Menus - FR"
     },
    filter_title: {
       es:"Filtros",
       fr:"Filtros - FR"
     },
    menu: {
       es:"Ver Carta",
       fr:"Ver Carta - FR"
     }
   }
  };

  filters = {
    categories : [],
    allergens:[],
    food_type: '',
  };

  constructor( 
      public _tecinaApi: TecinaApiService ,
      private route: ActivatedRoute,
      private router: Router,
    ) {     
  }

  initialiseInvites() {
    this._tecinaApi.getLanguages().subscribe(resp => {
      this.langs = resp;
    });
    this._tecinaApi.getCategories().subscribe(resp => {
      this.categories = resp;
    });
    this._tecinaApi.getFoodTypes().subscribe(resp => {
      this.foodTypes = resp;
    });
    this._tecinaApi.getAllergens().subscribe(resp => {
      this.allergens = resp;
    });
    this._tecinaApi.getDishes().subscribe(resp => {
      this.dishes = resp;
    });
  }

  getFilteredDishes ( categories=[], allergens=[], food_type = "" ){
    // let result;
    // let dishes = this.dishes;
    // Object.keys(dishes).forEach(function( k ){
    //   var dish_categories = dishes[k].categories;
    //   var dish_allergens = dishes[k].allergens;
    //   var dish_food_type = dishes[k].foodTypes;

    //   if (food_type != ""){
    //     Object.keys(dish_food_type).forEach(function( j ){
    //       //if ( dis)
    //       delete dishes[k]
    //     });
    //   }
      
    //   console.log(k + ' - ' + dishes[k]);

    // });

  }

  search( filters = this.filters ){
    console.log(filters);
  }
 
  ngOnInit(){
    this._tecinaApi.currentLAng.subscribe(
      resp => {
        this.currentLang = resp;
        this.initialiseInvites();
      }
    );
  }
  
  changeLang( new_lang ){
    this._tecinaApi.setCurrentLAng( new_lang );
  }

  ngOnDestroy() {
  //   if (this.routeLang) {  
  //     this.routeLang.unsubscribe();
  //  }
  }

}
