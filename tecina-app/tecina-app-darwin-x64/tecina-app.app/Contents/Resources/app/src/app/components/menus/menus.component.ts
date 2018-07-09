import { Component, OnInit, ViewChild } from '@angular/core';
import { ApiService } from "../../services/api.service";
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

  constructor(private _api: ApiService) {

    this._api.getCategories().subscribe(categories => {
      this.categories = categories;
    });

    this._api.getAllergens().subscribe(allergens => {
      this.allergens = allergens;
    });

    this._api.getFoodTypes().subscribe(foodTypes => {
      this.foodTypes = foodTypes;
    });

    this.imagesPath = this._api.imagesPath + "/dishes/";
  }

  initialiseState() {
    this._api.getMenus().map(
      resp => { return resp }
    ).subscribe(
      menus => {
        this.menus = this._api.subArray(menus, 3);
        this.goToIndex(0, 500);
      });
  }

  ngOnInit() {
    this._api.currentLang.subscribe(
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
    this._api.setPairing(open);
  }
}
