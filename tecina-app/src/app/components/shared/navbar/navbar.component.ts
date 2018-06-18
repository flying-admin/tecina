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
  currentLang;
  langs;
  categories;
  foodTypes;
  allergens;
  dishes;


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

  currentFilters;
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
    this._tecinaApi.getLanguages().subscribe(languages => {
      this.langs = languages;
    });

    this._tecinaApi.currentFilters.subscribe( filters => {
        this.currentFilters = filters;
    });

    this._tecinaApi.getCategories().subscribe(catefories => {
      this.categories = catefories;
    });
    this._tecinaApi.getFoodTypes().subscribe(foodTypes => {
      this.foodTypes = foodTypes;
    });
    this._tecinaApi.getAllergens().subscribe(allergens => {
      this.allergens = allergens;
    });
    this._tecinaApi.getDishes().subscribe(dishes => {
      this.dishes = dishes;
    });

   
  }

  getFilteredDishes ( categories=[] ){
    let _foodtype = this.filters.foodtype;
    let _allergens = this.filters.allergens;
    let _dishes = this.dishes;
    let result;
    console.log('cambia');
    Object.keys(_dishes).forEach(function( k ){ 
      var dish_categories = _dishes[k].categories;
      var dish_allergens = _dishes[k].allergens;
      var dish_foodtype = _dishes[k].foodTypes;
      console.log(_dishes[k]['foodTypes'])
      if (_foodtype.length > 0){
        Object.keys(dish_foodtype).forEach(function( j ){
          if( dish_foodtype[j].indexOf() ){

          }
        });
      }
    });
  }

  changeFilter( filterType:string , filterId:string, isChecked: boolean) {
    console.log('isChecked',isChecked);
    if(isChecked) {
      this.filters[filterType].push(filterId);
    } else {
      let index = this.filters[filterType].indexOf(filterId);

      if(index != -1) {
        this.filters[filterType].splice(index, 1);
      }
    }
    console.log("filters[filterType]" ,this.filters);
    this._tecinaApi.setCurrentFilters( this.filters );
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
