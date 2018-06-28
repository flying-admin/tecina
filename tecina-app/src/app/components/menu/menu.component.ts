import { Component, OnInit, ViewChild } from '@angular/core';
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
  menu = [];
  allergens;
  mainMenu = false;
  imagesPath;
  menu_id;
  initialSlider:number = 0;
  currentConfig: SwiperConfigInterface = {
    a11y: true,
    observer: true,
    direction: "vertical",
    speed: 500,
    freeMode: !0,
    freeModeSticky: !0,
    slidesPerView: 2,
    navigation: {
      prevEl: ".menu__details__slider__nav--prev",
      nextEl: ".menu__details__slider__nav--next",
      disabledClass: "menu__details__slider__nav--disabled"
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

  @ViewChild(SwiperDirective) swiperMenu?: SwiperDirective;

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
  }

  initialiseState() {
    this._tecinaApi.getMenus().subscribe(
      menus => {
        this.menus = menus;
        this.menu = this.getObject(menus, this.menu_id);
        console.log(this.menu);
        this.goToIndex(this.initialSlider);
      });
  }

  ngOnInit() {
    this._tecinaApi.currentLAng.subscribe(
      resp => {
        this.currentLang = resp;
        this.initialiseState();
      });
  }

  goToIndex(i) {
    setTimeout(() => {
      this.swiperMenu.setIndex(i);
    }, 1000);
  }

  getIcon( allergen_id ){
    var allergen = this.allergens.filter(
     a => { return a.id == allergen_id}
   );
   return allergen[0].icon;
 }

  getObject(value, args) {
    var obj = value.filter( element => { return element.id == args });
    if (obj.length != 0) {
      return obj[0];
    } else {
      return false;
    }
  }

  pairingStatus(open) {
    this._tecinaApi.setPairing(open);
  }

}
