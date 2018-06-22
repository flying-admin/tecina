import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from "@angular/common/http";
import  "rxjs/add/operator/map";
import { BehaviorSubject, Observable } from 'rxjs';



@Injectable()
export class TecinaApiService {

  private lang = new BehaviorSubject('es');
  currentLAng = this.lang.asObservable();

  private filters = new BehaviorSubject(
    { 
      categories: [],
      allergens: [],
      foodTypes: [] 
    }
  );
  currentFilters = this.filters.asObservable();

  private dishes = new BehaviorSubject([]);
  _dishes = this.dishes.asObservable();
 
  private wines = new BehaviorSubject([]);
  _wines = this.wines.asObservable();
 
  private categories = new BehaviorSubject([]);
  _categories = this.categories.asObservable();
 
  private foodTypes = new BehaviorSubject([]);
  _foodTypes = this.foodTypes.asObservable();
 
  private allergens = new BehaviorSubject([]);
  _allergens = this.allergens.asObservable();
 
  private languages = new BehaviorSubject([]);
  _languages = this.languages.asObservable();
 
  private highlights = new BehaviorSubject([]);
  _highlights = this.highlights.asObservable();
 
  private menus = new BehaviorSubject([]);
  _menus = this.menus.asObservable();
 

  pageRoot = "http://tecina-api.local/";
  //pageRoot = "http://tecina-api.local:8000/";
  imagesPath = this.pageRoot + "img";
  url = this.pageRoot + 'api';

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type':  'application/json',
      'Accept': 'application/json',
    })
  };

  constructor( public http:HttpClient) {
    this.setDishes().subscribe((resp:any[]) => { this.dishes.next(resp);});
    this.setAllergens().subscribe((resp:any[]) => { this.allergens.next(resp);});
    this.setCategories().subscribe((resp:any[]) => { this.categories.next(resp);});
    this.setFoodTypes().subscribe((resp:any[]) => { this.foodTypes.next(resp);});
    this.setLanguages().subscribe((resp:any[]) => { this.languages.next(resp);});
    this.setHighlights().subscribe((resp:any[]) => { this.highlights.next(resp);});
    this.setWines().subscribe((resp:any[]) => { this.wines.next(resp);});
    this.setMenus().subscribe((resp:any[]) => { this.menus.next(resp);});
  }

  // filter Dishes
  filterAll( dishes , filters, category? ){
    let _categories;

    if(category){
      _categories = category;
    }else{
      _categories = filters.categories;
    }

    let _foodTypes = filters.foodTypes;
    let _allergens = filters.allergens;
    var _dishes = dishes.slice(0);
    var _filteredDishes = []; 
    
    for (var D = 0; D < _dishes.length; D++) {
      var addDish = true;

      if( _categories.length != 0 && _dishes[D].categories.length != 0){
        var hasCategory = false;
        
        // si no tiene la categoria se elimina 
        outerloopC:
        for (var i = 0; i < _categories.length; i++) {
          for (var j = 0; j < _dishes[D].categories.length; j++) {
            if(_categories[i] == _dishes[D].categories[j]){
              hasCategory = true;
              break outerloopC; // finaliza ambos loops
            }
          }
        }

        if( hasCategory == false ){
          addDish = false
        }
      }

      if( _allergens.length != 0 && _dishes[D].allergens.length != 0 && addDish){
        var isAllergen = false;
        // si tiene el allergeno se elimina
        
        outerloopA:
        for (var a = 0; a < _allergens.length; a++) {
          for (var b = 0; b < _dishes[D].allergens.length; b++) {
            if(_allergens[a] == _dishes[D].allergens[b]){
              isAllergen = true;
              break outerloopA; // finaliza ambos loops
            }
          }
        }

        if( isAllergen ){
          addDish = false
        }
      }

      if( _foodTypes.length != 0 && _dishes[D].foodTypes.length != 0 && addDish){
          var isFoddType = false;
        
          // si no tiene el tipo de comida se elimina
          outerloopFT:
          for (var l = 0; l < _foodTypes.length; l++) {
            for (var m = 0; m < _dishes[D].foodTypes.length; m++) {
              if(_foodTypes[l] == _dishes[D].foodTypes[m]){
                isFoddType = true;
                break outerloopFT; // finaliza ambos loops
              }
            }
          }

          if( isFoddType == false ){
            addDish = false
          }
      }

      if(addDish){
        _filteredDishes.push(_dishes[D]);
      }
    }  

    return _filteredDishes;
  }

  // current Language
  setCurrentLAng( lang ){
    this.lang.next(lang);
  }

  // current Dish filters
  setCurrentFilters( filters ){
    this.filters.next( filters );
  }

  // Get sub array 
  subArray(array:any[] , size:number){
    if(array.length > 0 ){
      var newArray = [];
      for (let f = 0; f < array.length ; f+=size) {
        var max = (f+size > array.length ) ? array.length :f+3;
        newArray.push( array.slice(f, max)); 
      }
      return newArray;
    }
    return false;
  }

  // Dishes
  setDishes(){
    //   [
    //     {
    //         "id": 1,
    //         "ingredients": "ingredients_:0DGEUhw3rpxxjFRf",
    //         "lang": {
    //             "es": {
    //                 "name": "es_name1",
    //                 "description": "es description1"
    //             },
    //             "fr": {
    //                 "name": "fr_name1",
    //                 "description": "fr description1"
    //             }
    //         },
    //         "images": [
    //             "images1jpg",
    //             "images2jpg",
    //             "images3jpg"
    //         ],
    //         "allergens": [
    //             2,
    //             6
    //         ],
    //         "foodTypes": [],
    //         "categories": [
    //             1,
    //             2
    //         ]
    //     }
    // ]
   
    return  this.http.get(this.url + "/dishes" ,this.httpOptions );
  }
  getDishes( filters ,category? ){
    return this.dishes.map(
      dishes => {
        if (category){
          return this.filterAll( dishes ,filters, category );
        }else{
          return this.filterAll( dishes ,filters);
        }
    });
  }

  // Highlights
  getHighlights( lang ){
    return this.highlights;
  }
  setHighlights(){
    return this.http.get(this.url + "/highlights" ,this.httpOptions ); 
  }

  // Languages
  getLanguages(){
    return this.languages;
  }
  setLanguages(){
    //[{"id":1,"code":"es"},{"id":2,"code":"fr"}]
    return this.http.get(this.url + "/languages" ,this.httpOptions ); 
  }

  // Food categories
  getCategories(){
    return this.categories;
  }
  setCategories(){
 
    // [
    //   {
    //       "id": 1,
    //       "translate": {
    //           "es": {
    //               "name": "es_entrantes frios",
    //               "description": "es_entrantes frios description"
    //           },
    //           "fr": {
    //               "name": "fr_entrantes frios",
    //               "description": "fr_entrantes frios description"
    //           }
    //       }
    //   }
    // ]
    return this.http.get(this.url + "/categories" ,this.httpOptions );
  }

  // Food types
  getFoodTypes(){
    return this.foodTypes;
  }
  setFoodTypes(){
    // [
    //   {
    //       "id": 1,
    //       "translate": {
    //           "es": "es_comida vegana",
    //           "fr": "fr_comida vegana"
    //       }
    //   }
    // ]
    return this.http.get(this.url + "/food-types" ,this.httpOptions );
  }

  // Allergens
  getAllergens(){
    return this.allergens;
  }
  setAllergens(){
      // [
      //   {
      //       "id": 1,
      //       "icon": "crustaceos.jpg",
      //       "translate": {
      //           "es": {
      //               "name": "es_crustaceos",
      //               "description": "es_crustaceos description"
      //           },
      //           "fr": {
      //               "name": "fr_crustaceos",
      //               "description": "fr_crustaceos description"
      //           }
      //       }
      //   }
      // ]
    return this.http.get(this.url + "/allergens" ,this.httpOptions );
  }

  // Wines
  getWines(){
    return this.wines;
  }
  setWines(){
    return this.http.get(this.url + "/wines" ,this.httpOptions );
  }
 
  // Menus
  getMenus(){
    return this.menus;
  }
  setMenus(){
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
    return this.http.get(this.url + "/menus" ,this.httpOptions );
  }

}
