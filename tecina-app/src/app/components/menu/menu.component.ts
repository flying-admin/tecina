import { Component, OnInit, ViewChild,QueryList,ViewChildren } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { TecinaApiService } from "../../services/tecina-api.service";
import { SwiperDirective, SwiperConfigInterface } from 'ngx-swiper-wrapper';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styles: []
})
export class MenuComponent implements OnInit {

  currentLang: string = 'es';
  filters = {
    categories: [],
    allergens: [],
    foodTypes: []
  };
  menus;
  menu = {};
  allergens;
  pairing = true;
  imagesPath;
  menu_id;
  initialSlider:number = 0;
  swiperDishesConfig: SwiperConfigInterface = {
    a11y: true,
    observer: true,
    direction: "vertical",
    speed: 500,
    freeMode: !0,
    freeModeSticky: !0,
    slidesPerView: 2,
    initialSlide:0,
    navigation: {
      prevEl: ".menu__details__slider__nav--prev",
      nextEl: ".menu__details__slider__nav--next",
      disabledClass: "menu__details__slider__nav--disabled"
    }
  };

  swiperPairingConfig: SwiperConfigInterface = {
    a11y: true,
    observer: true,
    direction: "vertical",
    speed: 500,
    freeMode: !0,
    initialSlide:0,
    freeModeSticky: !0,
    slidesPerView: 3,
    navigation: {
      prevEl: ".wine-list__nav--prev",
      nextEl: ".wine-list__nav--next",
      disabledClass: "wine-list__nav--disabled"
    }
  };

  translations = {
    menu: {
      page_title: {
        es: "Menús",
        fr: "Menús - FR",
        en: "Menús - EN"
      },
      pairing:{
        title: {
          es: "Maridaje",
          fr: "Maridaje - FR",
          en: "Maridaje - EN"
        },
      }
    }
  };


  @ViewChildren(SwiperDirective) swiperView: QueryList<SwiperDirective>;

  constructor(
    private _activeRoute:ActivatedRoute,
    public _tecinaApi: TecinaApiService ,
    private router: Router
  ) {
    this._activeRoute.params.subscribe(
      params => {
        params.id ? this.menu_id = params.id :  this.router.navigate(['/menus']);
      }
    );

    this._tecinaApi.getAllergens().subscribe(allergens => {
      this.allergens = allergens;
    });

    this.imagesPath = this._tecinaApi.imagesPath;

    this._tecinaApi._pairing.subscribe(
      pairing => this.pairing = pairing
    );
  }

  initialiseState() {
    this._tecinaApi.getMenus().subscribe(
      menus => {
        this.menus = menus;
        this.menu = this._tecinaApi.getObjectById(menus, this.menu_id);
        this.goToIndexDishes(this.initialSlider);
        this.goToIndexPairing(this.initialSlider);
      });
  }

  ngOnInit() {
    this._tecinaApi.currentLAng.subscribe(
      resp => {
        this.currentLang = resp;
        this.initialiseState();
      });
  }

  goToIndexDishes(i ) {
    setTimeout(() => {
      (this.swiperView['_results'][0]).setIndex(i);
    }, 1000);
  }

  goToIndexPairing(i) {
    setTimeout(() => {
    (this.swiperView['_results'][1]).setIndex(i);
    }, 1000);
  }

  getIcon( allergen_id ){
    var allergen = this.allergens.filter(
     a => { return a.id == allergen_id}
   );
   return allergen[0].icon;
 }

  pairingStatus(open) {
    this._tecinaApi.setPairing(open);
  }

}
