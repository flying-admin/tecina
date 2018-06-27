import { Component, OnInit , ViewChild } from '@angular/core';
import { Router } from '@angular/router';
import { TecinaApiService } from "../../services/tecina-api.service";
import { SwiperDirective, SwiperConfigInterface } from 'ngx-swiper-wrapper';

@Component({
  selector: 'app-menus',
  templateUrl: './menus.component.html',
  styles: []
})
export class MenusComponent implements OnInit {
  currentLang: string = 'es';
  filters = {
    categories: [],
    allergens: [],
    foodTypes: []
  };
  menus;
  categories: {} = {};
  foodTypes: {} = {};
  allergens;
  title_category: {} = {};
  filtersMenu = false;
  imagesPath;
  dishes = [];


  currentConfig: SwiperConfigInterface = {
    a11y: true,
    observer: true,
    direction: "vertical",
    speed: 500,
    freeMode: !0,
    freeModeSticky: !0,
    slidesPerView: 1,
    navigation: {
      prevEl: ".menus__slider__nav--prev",
      nextEl: ".menus__slider__nav--next",
      disabledClass: "menus__slider__nav--disabled"
    }
  };

  translations = {
    menus: {
      title: {
        es: "Platos",
        fr: "Platos - FR",
        en: "Platos - EN"
      }
    },
    filters: {
      button: {
        es: "Ver filtros",
        fr: "Ver filtros - FR",
        en: "Ver filtros - EN"
      },
      button_change: {
        es: "Cambiar filtros",
        fr: "Cambiar filtros - FR",
        en: "Cambiar filtros - EN"
      },
      title: {
        es: "Filtros",
        fr: "Filtros - FR",
        en: "Filtros - EN"
      },
      allergen_title: {
        es: "Tipo de alérgeno",
        fr: "Tipo de alérgeno - FR",
        en: "Tipo de alérgeno - EN"
      },
      foodtypes_title: {
        es: "Tipo de comida",
        fr: "Tipo de comida  - FR",
        en: "Tipo de comida  - EN"
      },
      categores_title: {
        es: "Tipo de plato",
        fr: "Tipo de plato - FR",
        en: "Tipo de plato - EN"
      },
    }
  };

  @ViewChild(SwiperDirective) swiperMenus?: SwiperDirective;

  constructor(
    private _tecinaApi: TecinaApiService,
    private router: Router,
  ){
    this._tecinaApi.getCategories().subscribe(categories => {
      this.categories = categories;
    });

    this._tecinaApi.getAllergens().subscribe(allergens => {
      this.allergens = allergens;
    });

    this._tecinaApi.getFoodTypes().subscribe(foodTypes => {
      this.foodTypes = foodTypes;
    });

    this.imagesPath = this._tecinaApi.imagesPath + "/menus/";

    this._tecinaApi.getDishes().subscribe(
      dishes => { 
        this.dishes = dishes;
      }
    );
  }

  initialiseState() {
    this._tecinaApi.getDishes().subscribe(
      dishes => { 
      this._tecinaApi.getMenus().subscribe(
        menus => {
              this.dishes = dishes;
              console.log("d", dishes);
              console.log("m",menus);
          
                for (let m = 0; m < menus.length; m++) {

                  for (let d = 0; d < (menus[m].dishes).length; d++) {
                    var dish_id = menus[m].dishes[d];
                    menus[m].dishes[d] = this.getObject( dishes , dish_id );
                  }
                }
                console.log(menus);
                this.menus =  this._tecinaApi.subArray(menus, 3);
              }  
          );
        }
      );
      
  }

  ngOnInit() {
    this._tecinaApi.currentLAng.subscribe(
      resp => {
        this.currentLang = resp;
        this.initialiseState();
      }
    );
  }

  goToMenu(id: number) {
    this.router.navigate(['/menu', id]);
  }

  goToIndex(i) {
    setTimeout(() => {
      this.swiperMenus.setIndex(i);
    }, 1000);
  }

  getObject(value, args) {
    var obj = value.filter(element => { return element.id == args });
    if ( obj.length != 0 ) {
      return obj[0];
    } else {
      return false;
    }
  }

  pairingStatus(open) {
    this._tecinaApi.setPairing(open);
  }

}

 //   [{
  //     "id": 1,
  //     "image": "image-0.jpg",
  //     "translate": {
  //         "es": {
  //             "name": "es_name1",
  //             "description": "es-description1"
  //         },
  //         "fr": {
  //             "name": "fr_name1",
  //             "description": "fr-description1"
  //         },
  //         "en": {
  //             "name": "en_name1",
  //             "description": "en-description1"
  //         }
  //     },
  //     "dishes": [
  //         19,
  //         25,
  //         34,
  //         46,
  //         49
  //     ],
  //     "wines": [
  //         6,
  //         8,
  //         15
  //     ]
  // } ]          