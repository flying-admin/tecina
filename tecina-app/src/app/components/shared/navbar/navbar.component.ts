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
    foodTypes: [] 
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

  getFilteredDishes ( _categories=[] ){

    let _foodTypes = this.filters.foodTypes;
    let _allergens = this.filters.allergens;
    var _dishes = this.dishes.slice(0) ;
    var _removeDishes = []; 

    console.log('cambia');
    console.log("platos",_dishes);
    console.log("_foodTypes",_foodTypes);
    console.log("_allergens",_allergens);
    console.log("_categories",_categories);
    
    loopDishes:
    for (var D = 0; D < _dishes.length; D++) {
      if( _categories.length != 0 && _dishes[D].categories.length != 0){
        var hasCategory = false;
        
        // si no tiene la categoria se elimina 
        outerloopC:
        for (var i = 0; i < _categories.length; i++) {
          for (var j = 0; j < _dishes[D].categories.length; j++) {

            if(_categories[i] == _dishes[D].categories[j]){
              console.log("tiene la categoria");
              console.log(_dishes[D].categories);
              
              hasCategory = true;
              break outerloopC; // finaliza ambos loops
            }
          }
        }

        console.log(_dishes[D].categories ,hasCategory);
        if( hasCategory == false ){
          _removeDishes.push(_dishes[D].id);

          //_dishes.splice(D, 1);
          console.log(" nuevo", _dishes);
          continue loopDishes;
        }
       
      }

      if( _allergens.length != 0 && _dishes[D].allergens.length != 0){
        var isAllergen = false;
        // si tiene el allergeno se elimina
        
        outerloopA:
        for (var a = 0; a < _allergens.length; a++) {
          for (var b = 0; b < _dishes[D].allergens.length; b++) {
            if(_allergens[a] == _dishes[D].allergens[b]){
              isAllergen = true;
              console.log("tiene el allergeno");
              break outerloopA; // finaliza ambos loops
            }
          }
        }

        if( isAllergen ){
          //_dishes.splice(D, 1);
          _removeDishes.push(_dishes[D].id);
          console.log("tiene el allergeno");
          continue loopDishes;
        }

      }

      
      if( _foodTypes.length != 0 && _dishes[D].foodTypes.length != 0){
          var isFoddType = false;
        
          // si no tiene el tipo de comida se elimina
          outerloopFT:
          for (var l = 0; l < _foodTypes.length; l++) {
            for (var m = 0; m < _dishes[D].foodTypes.length; m++) {
              if(_foodTypes[l] == _dishes[D].foodTypes[m]){
                isFoddType = true;
                console.log("tipo de comida" );
                break outerloopFT; // finaliza ambos loops
              }
            }
          }

          if( isFoddType == false ){
            _removeDishes.push(_dishes[D].id);
            //_dishes.splice(D, 1);
            continue loopDishes;
          }
        
      }

    } 

    console.log("platos filtrados:",_dishes);
    var newArray = _dishes.filter(function (el) {
      return el.id <= 1000 &&
             el.sqft >= 500 &&
             el.num_of_beds >= 2 &&
             el.num_of_baths >= 1.5; // Changed this so a home would match
    });
    console.log(newArray);
    return _dishes;
  }


  changeFilter( filterType:string , filterId:string, isChecked: boolean) {
    //console.log('isChecked',isChecked);
    if(isChecked) {
      this.filters[filterType].push(filterId);
    } else {
      let index = this.filters[filterType].indexOf(filterId);

      if(index != -1) {
        this.filters[filterType].splice(index, 1);
      }
    }
    console.log("filters" ,this.filters);
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
