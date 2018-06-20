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
       fr:"Tipo de Alérgeno - FR",
       en:"Tipo de Alérgeno - EN"
     },
     foodtypes_title: {
       es:"Tipo de comida",
       fr:"Tipo de comida - FR",
       en:"Tipo de comida - EN"
     },
     wine_title: {
       es:"Carta de Vinos",
       fr:"Carta de Vinos - FR",
       en:"Carta de Vinos - EN"
     },
    menu_title: {
       es:"Menus",
       fr:"Menus - FR",
       en:"Menus - EN"
     },
    filter_title: {
       es:"Filtros",
       fr:"Filtros - FR",
       en:"Filtros - EN"
     },
    menu: {
       es:"Ver Carta",
       fr:"Ver Carta - FR",
       en:"Ver Carta - EN"
     }
   }
  };

  currentFilters;
  filters = {
    categories: [],
    allergens:[],
    foodTypes: [] 
  };

  constructor( 
      public _tecinaApi: TecinaApiService ,
      private _activeRoute: ActivatedRoute,
      private router: Router,
    ) {
      this._tecinaApi.getLanguages().subscribe(languages => {
        this.langs = languages;
      });
      this._tecinaApi.getCategories().subscribe(categories => {
        this.categories = categories;
      });
  
      this._tecinaApi.getFoodTypes().subscribe(foodTypes => {
        this.foodTypes = foodTypes;
      });
  
      this._tecinaApi.getAllergens().subscribe(allergens => {
        this.allergens = allergens;
      });
  }

  initialiseInvites() {
    this._tecinaApi.currentFilters.subscribe( filters => {
        this.currentFilters = filters;
    });

    this._tecinaApi.getDishes( ).subscribe(dishes => {
      this.dishes = dishes;
    });
  }

  getFilteredDishes ( _categories=[]){
    var _categories = (_categories.length != 0 ) ? _categories : this.filters.categories;
    let _foodTypes = this.filters.foodTypes;
    let _allergens = this.filters.allergens;
    var _dishes = this.dishes.slice(0);
    var _filteredDishes = []; 
    
    for (var D = 0; D < _dishes.length; D++) {
      var addDish = true;

      if( _categories.length != 0 && _dishes[D].categories.length != 0){
        var hasCategory = false;
        
        // si no tiene la categoria se elimina 
        outerloopC:
        for (var i = 0; i < _categories.length; i++) {
          for (var j = 0; j < _dishes[D].categories.length; j++) {
            if(_categories[i] == _dishes[D].categories[j]){
              hasCategory = true;
              break outerloopC; // finaliza ambos loops
            }
          }
        }

        if( hasCategory == false ){
          addDish = false
        }
      }

      if( _allergens.length != 0 && _dishes[D].allergens.length != 0 && addDish){
        var isAllergen = false;
        // si tiene el allergeno se elimina
        
        outerloopA:
        for (var a = 0; a < _allergens.length; a++) {
          for (var b = 0; b < _dishes[D].allergens.length; b++) {
            if(_allergens[a] == _dishes[D].allergens[b]){
              isAllergen = true;
              break outerloopA; // finaliza ambos loops
            }
          }
        }

        if( isAllergen ){
          addDish = false
        }
      }

      if( _foodTypes.length != 0 && _dishes[D].foodTypes.length != 0 && addDish){
          var isFoddType = false;
        
          // si no tiene el tipo de comida se elimina
          outerloopFT:
          for (var l = 0; l < _foodTypes.length; l++) {
            for (var m = 0; m < _dishes[D].foodTypes.length; m++) {
              if(_foodTypes[l] == _dishes[D].foodTypes[m]){
                isFoddType = true;
                break outerloopFT; // finaliza ambos loops
              }
            }
          }

          if( isFoddType == false ){
            addDish = false
          }
      }

      if(addDish){
        _filteredDishes.push(_dishes[D]);
      }
    }     
    return _filteredDishes;
  }


  changeFilter( filterType:string , filterId:string, isChecked: boolean) {
    if(isChecked) {
      this.filters[filterType].push(filterId);
    } else {
      let index = this.filters[filterType].indexOf(filterId);

      if(index != -1) {
        this.filters[filterType].splice(index, 1);
      }
    }
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

  goToDishes( categoryId:number ){
    this.filters.categories = [categoryId];
    this._tecinaApi.setCurrentFilters( this.filters );
    this.router.navigate(['/dishes']);
  }

  ngOnDestroy() {}

}
