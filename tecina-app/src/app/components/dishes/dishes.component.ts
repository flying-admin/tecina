import { Component, OnInit, Input } from '@angular/core';
import { Router } from '@angular/router';
import { ViewChild } from '@angular/core'
import { TecinaApiService } from "../../services/tecina-api.service";
import { SwiperComponent, SwiperDirective, SwiperConfigInterface,
  SwiperScrollbarInterface, SwiperPaginationInterface } from 'ngx-swiper-wrapper';


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
  allergens;
  title_category:{} = {};
  public show: boolean = false;


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
    }
   };

   //@ViewChild(SwiperComponent) componentRef?: SwiperComponent;
   @ViewChild(SwiperDirective) directiveRef?: SwiperDirective;

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
  }



  initialiseState(){    
    this._tecinaApi.currentFilters.subscribe( filters => {
      this._tecinaApi.getDishes( filters ).subscribe(
        dishes => { 
          this.dishes = this._tecinaApi.subArray( dishes , 3 );
          this.currentFilters = filters;
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
      this.directiveRef.setIndex(i);
    }, 1000);
  }
  
}
