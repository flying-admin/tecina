import { Component, OnInit, ViewChild } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ApiService } from "../../services/api.service";
import { SwiperDirective, SwiperConfigInterface } from 'ngx-swiper-wrapper';


@Component({
  selector: 'app-dish',
  templateUrl: './dish.component.html',
  styles: []
})
export class DishComponent implements OnInit {
  currentLang:string = 'es' ;
  currentFilters:{} = {} ;
  dishes;
  allergens;
  initialSlider:number = 0;
  dish_id:number;
  imagesPath;
  no_results:boolean = false;

  currentConfig: SwiperConfigInterface = {
    a11y: true,
    observer:true,
    direction: 'vertical',
    speed: 500,
    freeMode: true,
    freeModeSticky: true,
    slidesPerView: 1,
    navigation: {
      prevEl: '.dish__slider__nav--prev',
      nextEl: '.dish__slider__nav--next',
      disabledClass: 'dish__slider__nav--disabled'
    }
  };

  translations = {
    dish: {
      allergens_title: {
        es:"Alergenos",
        en:"Allergens",
        de:"Allergene",
      }
    }
   };

  @ViewChild(SwiperDirective) swiperDish?: SwiperDirective;

  constructor(
    private _activeRoute:ActivatedRoute,
    public _api: ApiService ,
    private router: Router
  ) { 
    this.imagesPath = this._api.imagesPath + "/dishes/"; 

    this._activeRoute.params.subscribe(
      params => {
        params.id ? this.initialSlider = params.id :  this.router.navigate(['/dishes']);
      }
    );
    
    this._api.getAllergens().subscribe(allergens => {
      this.allergens = allergens;
    });
  }

  initialiseState(){    
    this._api.currentFilters.flatMap( 
      filters => {
        this.currentFilters = filters;
        return this._api.getDishes( filters ).map(
          dishes => {
            // for (let D = 0; D < dishes.length; D++) {
            //   var object = dishes[D]['translate'];
            //   for (const key in object) {
            //       for (const _key in object[key]) {
            //        if(( typeof object[key][_key] !== 'undefined' && object[key][_key]).length > 80  ){
            //         object[key][_key] = ((object[key][_key]).substring(0, 75)) + " ...";
            //        }
            //       }
            //   }
            // }
            return dishes;
          }
        );
    })
    .subscribe(
      dishes => { 
        this.dishes = dishes;
        if(dishes.length != 0){
          this.no_results = false;
          this.goToIndex( this.initialSlider );
        }else{
          this.no_results = true;
        }
        
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

  goToIndex(i , delay=1000) {
    setTimeout(() => {
      this.swiperDish.setIndex(i);
    }, delay);
  }

}
