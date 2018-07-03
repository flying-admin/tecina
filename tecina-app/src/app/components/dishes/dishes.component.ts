import { Component, OnInit, ViewChild } from '@angular/core';
import { Router } from '@angular/router';
import { TecinaApiService } from "../../services/tecina-api.service";
import { SwiperDirective, SwiperConfigInterface } from 'ngx-swiper-wrapper';


@Component({
  selector: 'app-dishes',
  templateUrl: './dishes.component.html',
  styles: []
})

export class DishesComponent implements OnInit {
  currentLang: string = 'es';
  currentFilters = {
    categories: [],
    allergens: [],
    foodTypes: []
  };
  dishes;
  categories: {} = {};
  foodTypes: {} = {};
  allergens;
  filtersMenu = false;
  imagesPath;

  currentConfig: SwiperConfigInterface = {
    observer: true,
    a11y: true,
    direction: 'vertical',
    speed: 500,
    freeMode: true,
    freeModeSticky: true,
    slidesPerView: 2,
    navigation: {
      prevEl: '.dishes__slider__nav--prev',
      nextEl: '.dishes__slider__nav--next',
      disabledClass: 'dishes__slider__nav--disabled'
    },
  };

  translations = {
    dishes: {
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

  title_category: {} = this.translations.dishes.title;


  @ViewChild(SwiperDirective) swiperDishes?: SwiperDirective;

  constructor(
    private _tecinaApi: TecinaApiService,
    private router: Router,
  ) {
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

    this._tecinaApi._filtersMenu.subscribe(
      filters_menu => this.filtersMenu = filters_menu
    );
  }

  initialiseState() {
    this._tecinaApi.currentFilters.subscribe(filters => {
      this._tecinaApi.getDishes(filters).subscribe(
        dishes => {
          this.dishes = this._tecinaApi.subArray(dishes, 3);

          if (this.currentFilters != filters) {
            this.currentFilters = filters;
          }

          this.goToIndex(0);
          if ((filters.categories).length == 1) {
            var i = filters.categories[0];
            this.title_category =  this._tecinaApi.getObjectBy(this.categories,i,'translate');
          } else {
            this.title_category = this.translations.dishes.title;
          }
        }
      );
    });
  }

  clearFilters(){this._tecinaApi.clearFilters()}

  ngOnInit() {
    this._tecinaApi.currentLang.subscribe(
      resp => {
        this.currentLang = resp;
        this.initialiseState();
      }
    );
  }

  goToDish(id: number) {
    this.router.navigate(['/dish', id]);
  }

  goToIndex(i) {
    setTimeout(() => {
      this.swiperDishes.setIndex(i);
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
