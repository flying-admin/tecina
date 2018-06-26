import { Component, OnInit, ViewChild } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { TecinaApiService } from "../../services/tecina-api.service";
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
        fr:"Alergenos - FR",
        en:"Alergenos - EN"
      }
    }
   };

  @ViewChild(SwiperDirective) swiperDish?: SwiperDirective;

  constructor(
    private _activeRoute:ActivatedRoute,
    public _tecinaApi: TecinaApiService ,
    private router: Router
  ) { 
    this.imagesPath = this._tecinaApi.imagesPath + "/dishes/"; 

    this._activeRoute.params.subscribe(
      params => {
        params.id ? this.initialSlider = params.id :  this.router.navigate(['/dishes']);
      }
    );
    
    this._tecinaApi.getAllergens().subscribe(allergens => {
      this.allergens = allergens;
    });
  }

  initialiseState(){    
    this._tecinaApi.currentFilters.subscribe( filters => {
      this._tecinaApi.getDishes( filters ).subscribe(
        dishes => { 
          this.dishes = dishes;
          this.currentFilters = filters;
          this.goToIndex( this.initialSlider );
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

  getIcon( allergen_id ){
     var allergen = this.allergens.filter(
      a => { return a.id == allergen_id}
    );
    return allergen[0].icon;
  }

  goToIndex( i ){    
    setTimeout(() => {
      this.swiperDish.setIndex(i);
    }, 1000);
  }

}
