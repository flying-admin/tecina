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
  currentFilters = {
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

    this._tecinaApi._filtersMenu.subscribe(
      filters_menu => this.filtersMenu = filters_menu
    );
  }

  initialiseState() {
    this._tecinaApi.currentFilters.subscribe( filters => {
      this._tecinaApi.getMenus().subscribe(
        menus => {
          this.menus = this._tecinaApi.subArray(menus, 3);

          if (this.currentFilters != filters) {
            this.currentFilters = filters;
          }

          this.goToIndex(0);
          if ((filters.categories).length == 1) {
            var i = filters.categories[0];
            this.title_category = this.categories[i - 1]['translate'];
          } else {
            this.title_category = {};
          }
        }
      );
    });
  }

  ngOnInit() {
    this._tecinaApi.currentLAng.subscribe(
      resp => {
        this.currentLang = resp;
        this.initialiseState();
      }
    );
  }

  goToDish(id: number) {
    this.router.navigate(['/dish', id]);
  }

  getIcon(allergen_id) {
    if (this.allergens.length > 0) {
      var allergen = this.allergens.filter(
        a => { return a.id == allergen_id }
      );
      return allergen[0].icon;
    } else {
      return false;
    }
  }

  goToIndex(i) {
    setTimeout(() => {
      this.swiperMenus.setIndex(i);
    }, 1000);
  }

  // filters 
  changeFilter(filterType: string, filterId: string, isChecked: boolean) {
    if (isChecked) {
      this.currentFilters[filterType].push(filterId);
    } else {
      let index = this.currentFilters[filterType].indexOf(filterId);

      if (index != -1) {
        this.currentFilters[filterType].splice(index, 1);
      }
    }
    this._tecinaApi.setCurrentFilters(this.currentFilters);
  }

  inArray(value, args) {
    if ((value.findIndex(element => { return element == args })) != -1) {
      return true;
    } else {
      return false;
    }
  }

  filtersMenuStatus(open) {
    this._tecinaApi.setFiltersMenu(open);
  }

  mainMenuStatus(open) {
    this._tecinaApi.setMainMenu(open);
  }

  conuntFilters() {
    var total = (this.currentFilters.categories).length + (this.currentFilters.foodTypes).length + (this.currentFilters.allergens).length;
    return total;
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