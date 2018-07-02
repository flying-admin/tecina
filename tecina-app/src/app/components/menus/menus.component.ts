import { Component, OnInit, ViewChild } from '@angular/core';
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
        es: "Menus",
        fr: "Menus - FR",
        en: "Menus - EN"
      },
      pairing: {
        es: "Maridaje",
        fr: "Maridaje - FR",
        en: "Maridaje - EN"
      },
      pairing_txt: {
        es: "Incluido en el menú",
        fr: "Incluido en el menú - FR",
        en: "Incluido en el menú - EN"
      },
    }
  };

  @ViewChild(SwiperDirective) swiperMenus?: SwiperDirective;

  constructor(private _tecinaApi: TecinaApiService) {

    this._tecinaApi.getCategories().subscribe(categories => {
      this.categories = categories;
    });

    this._tecinaApi.getAllergens().subscribe(allergens => {
      this.allergens = allergens;
    });

    this._tecinaApi.getFoodTypes().subscribe(foodTypes => {
      this.foodTypes = foodTypes;
    });

    this.imagesPath = this._tecinaApi.imagesPath + "/dishes/";



  }

  initialiseState() {
      this._tecinaApi.getMenus().subscribe(
        menus => {
            console.log("menis en menus",menus);
            this.menus = this._tecinaApi.subArray(menus, 3);
      });
  }

  ngOnInit() {
    this._tecinaApi.currentLang.subscribe(
      resp => {
        this.currentLang = resp;
        this.initialiseState();
      }
    );
  }

  goToIndex(i) {
    setTimeout(() => {
      this.swiperMenus.setIndex(i);
    }, 1000);
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