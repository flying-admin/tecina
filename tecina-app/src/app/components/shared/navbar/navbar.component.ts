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
     foodtypes_title: {
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
    foodtype: [] 
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

  getFilteredDishes ( categories=[] ){
    let _foodtype = this.filters.foodtype;
    let _allergens = this.allergens;
    let _dishes = this.dishes;
    let result;

    Object.keys(_dishes).forEach(function( k ){
      var dish_categories = _dishes[k].categories;
      var dish_allergens = _dishes[k].allergens;
      var dish_foodtype = _dishes[k].foodTypes;
      console.log(_dishes[k]['foodTypes'])
      // if (_foodtype != ""){
      //   Object.keys(dish_foodtype).forEach(function( j ){
      //     //if ( dis)
      //     console.log(_dishes[k]);
      //     //delete _dishes[k]
      //   });
      // }
      
      console.log(k + ' - ' + _dishes[k]);

    });
  }

  addFoodTypeFilter(foodTypeId:string, isChecked: boolean) {
    if(isChecked) {
      this.filters.foodtype.push(foodTypeId);
    } else {
      let index = emailFormArray.controls.findIndex(x => x.value == email)
      emailFormArray.removeAt(index);
    }
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
