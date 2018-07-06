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
        es: 'Menus',
        en: 'Menus',
        de: 'Menüs',
      },
      pairing: {
        es: 'Maridaje',
        en: 'Pairing',
        de: 'Paarung',
      },
      pairing_txt: {
        es: 'Incluido en el menú',
        en: 'Included in the menu',
        de: 'Im Menü enthalten',
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
    this._tecinaApi.getMenus().map(
      resp => { return resp }
    ).subscribe(
      menus => {
        this.menus = this._tecinaApi.subArray(menus, 3);
        this.goToIndex(0, 500);
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

  goToIndex(i, delay = 1000) {
    setTimeout(() => {
      this.swiperMenus.setIndex(i);
    }, delay);
  }

  pairingStatus(open) {
    this._tecinaApi.setPairing(open);
  }
}
