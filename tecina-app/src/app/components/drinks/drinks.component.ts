import { Component, OnInit, ViewChild } from '@angular/core';
import { ApiService } from "../../services/api.service";
import { SwiperDirective, SwiperConfigInterface } from 'ngx-swiper-wrapper';


@Component({
  selector: 'app-drinks',
  templateUrl: './drinks.component.html',
  styles: []
})
export class DrinksComponent implements OnInit {
  imagesPath:string;
  currentLang: string = 'es';
  no_results: boolean = false ;
  drinkFilters = [];
  drinks:any[] = [];
  drinkTypes: any[] = [];
  allDrinks: any[] = [];
  translations = {
    drinks: {
      page_title:{
        es: 'Carta de Bebidas',
        en: 'Drinks menu',
        de: 'Getränkekarte',
      },
      filters:{
        title:{
          es: 'Tipo de bebida',
          en: 'Type of drink',
          de: 'Art des trinkens',
        },
        button:{
          es: 'Limpiar filtros',
          en: 'Clear filters',
          de: 'Klare Filter',
        },
      }
    }
  };

  currentConfig: SwiperConfigInterface = {
    observer: true,
    a11y: true,
    direction: 'vertical',
    speed: 500,
    freeMode: true,
    freeModeSticky: true,
    slidesPerView: 3,
    navigation: {
      prevEl: '.drink-list__nav--prev',
      nextEl: '.drink-list__nav--next',
      disabledClass: 'drink-list__nav--disabled'
    }
  };

  @ViewChild(SwiperDirective) swiperDrinks?: SwiperDirective;

  constructor(private _api: ApiService) {
    this.imagesPath = this._api.imagesPath + "/drinks/";
  }
  
  initialiseState(){

    this._api.getDrinkTypes().flatMap(
      (drinkTypes: any) => {
        return this._api.getDrinks() 
          .map((drinks: any) => {
            this.allDrinks = drinks;
            let drinks_types = [];
            let used_types = [];
            for (let D = 0; D < drinks.length; D++) {
              if( drinks_types.indexOf(drinks[D].drink_type_id) == -1){
                drinks_types.push(drinks[D].drink_type_id);
                var el = this._api.getObjectBy(drinkTypes,drinks[D].drink_type_id)
                if( el  !== []){
                  used_types.push(el);
                } 
              }
            }
            this.drinkTypes = used_types;
            return this._api.subArray(drinks, 2);
          });
    }).subscribe(
      drinks => {
        this.drinks = drinks
        if(drinks.length != 0 ){
          this.goToIndex(0);
          this.no_results= false;
        }else{
          this.no_results= true;
        }
    });
  }

  clearFilters(){
    this.drinkFilters = [] ;
    this.no_results = false;
    this.drinks = this._api.subArray( this.allDrinks ,2);
    this.goToIndex(0,500);
  }

  goToIndex(i:number , delay = 1000) {
    setTimeout(() => {
      this.swiperDrinks.setIndex(i);
    }, delay);
  }


  inArray(value, args) {
    if ((value.findIndex(element => { return element == args })) != -1) {
      return true;
    } else {
      return false;
    }
  }

  getFilteredDrinks(){
    let _filters = this.drinkFilters;
    let _drinks = (this.allDrinks).slice(0);
    let _filteredDrinks = [];


    for (var D = 0; D < _drinks.length; D++) {
      var addWine = true;

      if (_filters.length != 0 && _drinks[D].drink_type_id != null && _filters.indexOf(_drinks[D].drink_type_id) == -1) {
        addWine = false;
      }

      if (addWine) {
        _filteredDrinks.push(_drinks[D]);
      }
    }
    
    if (_filteredDrinks.length == 0){
      this.no_results = true;
      this.drinks = _filteredDrinks;
    }else{
      this.no_results = false;
      this.drinks = this._api.subArray(_filteredDrinks, 2);
      this.goToIndex(0, 1000);
    }
  }

  changeDrinkFilters(filterId: string, isChecked: boolean) {
    let index = this.drinkFilters.indexOf(filterId);
    let change = false;

    if (isChecked) {
      if (index == -1) {
        change = true;
        this.drinkFilters.push(filterId);
      }
    } else {
      if (index != -1) {
        change = true;
        this.drinkFilters.splice(index, 1);
      }
    }
    change && this.getFilteredDrinks();
  }

  ngOnInit() {
    this._api.currentLang.subscribe(
      resp => {
        this.currentLang = resp;
        this.initialiseState();
      }
    );
  }

}
