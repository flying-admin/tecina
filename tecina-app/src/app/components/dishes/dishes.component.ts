import { Component, OnInit ,ViewChild} from '@angular/core';
import { Router } from '@angular/router';
import { TecinaApiService } from "../../services/tecina-api.service";
import { SwiperDirective, SwiperConfigInterface } from 'ngx-swiper-wrapper';


@Component({
  selector: 'app-dishes',
  templateUrl: './dishes.component.html',
  styles: []
})

export class DishesComponent implements OnInit {
  currentLang:string = 'es' ;
  highlights;
  currentFilters:{} = {} ;
  dishes;
  categories:{} = {};
  foodTypes:{} = {};
  allergens;
  title_category:{} = {};
  filters = {
    categories: [],
    allergens:[],
    foodTypes: [] 
  };

  currentConfig: SwiperConfigInterface = {
    direction: 'vertical',
    speed: 500,
    a11y: true,
    freeMode: true,
    observer:true,
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
        es:"Platos",
        fr:"Platos - FR",
        en:"Platos - EN"
      }
    },
    filters: {
      button: {
        es:"Ver filtros",
        fr:"Ver filtros - FR",
        en:"Ver filtros - EN"
      },
      title: {
        es:"Filtros",
        fr:"Filtros - FR",
        en:"Filtros - EN"
      },
      allergen_title: {
        es:"Tipo de alérgeno",
        fr:"Tipo de alérgeno - FR",
        en:"Tipo de alérgeno - EN"
      },
      foodtypes_title: {
        es:"Tipo de comida",
        fr:"Tipo de comida  - FR",
        en:"Tipo de comida  - EN"
      },
      categores_title: {
        es:"Tipo de plato",
        fr:"Tipo de plato - FR",
        en:"Tipo de plato - EN"
      },
    }
   };

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
  }

  initialiseState(){    
    this._tecinaApi.currentFilters.subscribe( filters => {
      this._tecinaApi.getDishes( filters ).subscribe(
        dishes => { 
          this.dishes = this._tecinaApi.subArray( dishes , 3 );
          this.currentFilters = filters;
          console.log(this.currentFilters);
          
          this.goToIndex( 0 );
          if( (filters.categories).length == 1 ){
            var i =  filters.categories[0];
            this.title_category = this.categories[i-1]['translate'];
          }else{
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

  goToDish(id:number){
    this.router.navigate(['/dish',id]);
  }

  getIcon( allergen_id ){
     var allergen = this.allergens.filter(
      a => { return a.id == allergen_id}
    );
    return allergen[0].icon;
  }

  goToIndex( i ){    
    setTimeout(() => {
      this.swiperDishes.setIndex(i);
    }, 1000);
  }
  

  // filters 
  changeFilter( filterType:string , filterId:string, isChecked: boolean) {
    if(isChecked) {
      this.filters[filterType].push(filterId);
    } else {
      let index = this.filters[filterType].indexOf(filterId);

      if(index != -1) {
        this.filters[filterType].splice(index, 1);
      }
    }
    this._tecinaApi.setCurrentFilters( this.filters );
  }

 
  inArray( value , args ){
    if ((value.findIndex(element => { return element == args })) != -1){
      return true;
    }else{
      return false;
    }
  }

}
