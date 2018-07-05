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
  no_results: boolean = true ;
  drinkFilters = {};
  drinks:any[] = [];
  drinkTypes: any[] = [];
  allDrinks: any[] = [];
  translations = {
    drinks: {}
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
    this._tecinaApi.getDrinks().subscribe(
      drinks => {
        this.allDrinks = drinks;
        this.drinks = this._tecinaApi.subArray(drinks, 2);
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

  ngOnInit() {
    this._tecinaApi.currentLang.subscribe(
      resp => {
        this.currentLang = resp;
        this.initialiseState();
      }
    );
  }


}
