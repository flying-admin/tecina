import { Component, OnInit,OnDestroy } from '@angular/core';
import { TecinaApiService } from "../../../services/tecina-api.service";
import { ActivatedRoute, Router } from '@angular/router';


@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styles: []
})

export class NavbarComponent implements OnInit, OnDestroy {
  currentLang = 'es';
  langs = [];
  categories = [];
  foodTypes = [];
  allergens = [];
  dishes = [];
  menus = [];
  wines =[];
  mainMenu = false;



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
     drinks_title: {
      es:"Carta de Bebidas",
      fr:"Carta de Bebidas - FR",
      en:"Carta de Bebidas - EN"
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

  currentFilters = {
    categories: [],
    allergens:[],
    foodTypes: [] 
  };

  constructor( 
      public _tecinaApi: TecinaApiService ,
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
      this._tecinaApi.getMenus().subscribe(menus => {
        this.menus = menus;
      });
      this._tecinaApi.getWines().subscribe(wines => {
        this.wines = wines;
      });

      this._tecinaApi._mainMenu.subscribe(
        main_menu => this.mainMenu = main_menu
      );
  }

  initialiseInvites() {
    this._tecinaApi.currentFilters.subscribe( filters => {
      this._tecinaApi.getDishes( filters , [] ).subscribe(
        dishes => { 
          this.dishes = dishes;
          this.currentFilters = filters;
          console.log("menu" ,this.currentFilters);

        }
      );
    });
  }

  getFilteredDishes ( _categories ){
    return this._tecinaApi.filterAll( this.dishes , this.currentFilters ,_categories);
  }


  changeFilter( filterType:string , filterId:string, isChecked: boolean) {
    if(isChecked) {
      this.currentFilters[filterType].push(filterId);
    } else {
      let index = this.currentFilters[filterType].indexOf(filterId);

      if(index != -1) {
        this.currentFilters[filterType].splice(index, 1);
      }
    }
    this._tecinaApi.setCurrentFilters( this.currentFilters );
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
    this.currentFilters.categories = [categoryId];
    this._tecinaApi.setCurrentFilters( this.currentFilters );
    this.router.navigate(['/dishes']);
  }

  filtersMenuStatus( open ){
    this._tecinaApi.setFiltersMenu(open);
  }
  mainMenuStatus( open ){
    this._tecinaApi.setMainMenu(open);
  }

  inArray( value , args ){
    if ((value.findIndex(element => { return element == args })) != -1){
      return true;
    }else{
      return false;
    }
  }

  ngOnDestroy() {}

}
