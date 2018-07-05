import { Component, OnInit, ViewChild } from '@angular/core';
import { TecinaApiService } from "../../services/tecina-api.service";
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
        es: 'Carta de bebidas',
        de: 'Carta de bebidas - DE',
        en: 'Carta de bebidas - EN'
      },
      filters:{
        title:{
          es: 'Tipo de bebida',
          de: 'Tipo de bebida - DE',
          en: 'Tipo de bebida - EN'
        },
        button:{
          es: 'Limpiar filtros',
          de: 'Limpiar filtros-DE',
          en: 'Limpiar filtros-EN'
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
      prevEl: '.wine-list__nav--prev',
      nextEl: '.wine-list__nav--next',
      disabledClass: 'wine-list__nav--disabled'
    }
  };

  @ViewChild(SwiperDirective) swiperDrinks?: SwiperDirective;

  constructor(private _tecinaApi: TecinaApiService) {
    this.imagesPath = this._tecinaApi.imagesPath + "/wines/";
  }
  
  initialiseState(){

    this._tecinaApi.getDrinkTypes().flatMap( (drinkTypes:any[]) => {
      this.drinkTypes = drinkTypes;
      console.log("drinkTypes",drinkTypes);
      
      return  this._tecinaApi.getDrinks().map(
        drinks => {
          for (let D = 0; D < drinks.length; D++) {
          
            var drink_type = []
            var type = this._tecinaApi.getObjectBy( drinkTypes,drinks[D]['id_type'] );

            if (type.length != [] ){
              drink_type.push(type);
            }

            drinks[D]['drink_type'] = drink_type;
          }
          return drinks;
      })
    }).subscribe(
      drinks => {
        this.allDrinks = drinks;
        this.drinks = this._tecinaApi.subArray(drinks, 2);
        console.log("c drinks",drinks);
      }
    );

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
    this._tecinaApi.currentLang.subscribe(
      resp => {
        this.currentLang = resp;
        this.initialiseState();
      }
    );
  }


}
