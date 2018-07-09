import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from "@angular/common/http";
import  "rxjs/add/operator/map";
import { BehaviorSubject, Observable } from 'rxjs';



@Injectable()
export class ApiService {

  pageRoot = "https://tecina-gara.flyingpigs.es/";
  //pageRoot = "http://tecina-api.local/";

  private lang = new BehaviorSubject('es');
  currentLang = this.lang.asObservable();

  private mainMenu = new BehaviorSubject(false);
  _mainMenu = this.mainMenu.asObservable();

  private filtersMenu = new BehaviorSubject(false);
  _filtersMenu = this.filtersMenu.asObservable();

  private pairing = new BehaviorSubject(false);
  _pairing = this.pairing.asObservable();

 
  defaultFilters = 
  { 
    categories: [],
    allergens: [],
    foodTypes: [] 
  };

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
  
  private winesTypes = new BehaviorSubject([]);
  _winesTypes = this.winesTypes.asObservable();

  private winesVarieties = new BehaviorSubject([]);
  _winesVarieties = this.winesVarieties.asObservable();

  private winesDO = new BehaviorSubject([]);
  _winesDO = this.winesDO.asObservable();
 
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

  private drinks = new BehaviorSubject([]);
  _drinks = this.drinks.asObservable();

  private drinkTypes = new BehaviorSubject([]);
  _drinkTypes = this.drinkTypes.asObservable();


  public imagesPath = this.pageRoot + "img";
  public api = this.pageRoot + 'api';

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type':  'application/json',
      'Accept': 'application/json',
    })
  };

  constructor( public http:HttpClient) {

    // this.setAllergens().subscribe((resp:any[]) => { this.allergens.next(resp);});
    // this.setCategories().subscribe((resp:any[]) => { this.categories.next(resp);});
    // this.setFoodTypes().subscribe((resp:any[]) => { this.foodTypes.next(resp);});
    this.setLanguages().subscribe((resp:any[]) => { this.languages.next(resp);});
    this.setHighlights().subscribe((resp:any[]) => { this.highlights.next(resp);});
    // this.setWinesDO().subscribe((resp:any[]) => { this.winesDO.next(resp);});
    // this.setWinesTypes().subscribe((resp:any[]) => { this.winesTypes.next(resp);});
    // this.setWinesVarieties().subscribe((resp:any[]) => { this.winesVarieties.next(resp);});

    //this.setCompleteDishes().subscribe((resp:any[]) => { this.dishes.next(resp); ;});
   // this.setCompleteWines().subscribe((resp:any[]) => { this.wines.next(resp);});
    this.setCompleteMenus().subscribe((resp:any[]) => { this.menus.next(resp);});
    //this.setDrinkTypes().subscribe((resp:any[]) => { this.drinkTypes.next(resp);});
   // this.setDrinks().subscribe((resp:any[]) => { this.drinks.next(resp);});
   this.setCompleteDrinks().subscribe((resp:any[]) => { this.drinks.next(resp);});
  }


 

  // Get sub array 
  subArray(array:any[] , size:number){
    if(array.length > 0 ){
      var newArray = [];
      for (let f = 0; f < array.length ; f+=size) {
        var max = (f+size > array.length ) ? array.length :f+size;
        newArray.push( array.slice(f, max)); 
      }
      return newArray;
    }
    return [];
  }

  getObjectBy(array, args ,key?) {
    var obj =  obj = array.filter(element => { return element.id == args });

    if (obj.length != 0) {
      if(key){
        return obj[0][key];
      }else{
        return obj[0];
      }
    } else {
      return [];
    }
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

  // current Dish filters
   setCurrentFilters( filters ){
    this.filters.next( filters );
  }
  // current Language
  setCurrentLAng( lang ){
    this.lang.next(lang);
  }

  public setMainMenu( state:boolean ){
    this.mainMenu.next(state);
  }

  public setFiltersMenu( state:boolean ){
    this.filtersMenu.next(state);
  }

  public setPairing( state:boolean ){
    this.pairing.next(state);
  }



  // Dishes
  setDishes(): Observable<any>{
    return  this.http.get(this.api + "/dishes" ,this.httpOptions );
  }

  getDishes( filters? ,category? ){
    return this._dishes.map(
      dishes => {
        if (category){
          return this.filterAll( dishes ,filters, category );
        }else if(filters){
          return this.filterAll( dishes ,filters);
        }else{
          return dishes;
        }
    });
  }

  // Highlights
  getHighlights(){
    return this._highlights;
  }
  setHighlights(): Observable<any>{
    return this.http.get(this.api + "/highlights" ,this.httpOptions ).map(
      (res) => {
        return res;
      }
    ); 
  }

  // Languages
  getLanguages(){
    return this._languages;
  }
  setLanguages(){
    return this.http.get(this.api + "/languages" ,this.httpOptions ); 
  }

  // Food categories
  getCategories(){
    return this._categories;
  }
  setCategories(): Observable<any>{
    return this.http.get(this.api + "/categories" ,this.httpOptions );
  }

  // Food types
  getFoodTypes(){
    return this._foodTypes;
  }
  setFoodTypes(): Observable<any>{
    return this.http.get(this.api + "/food-types" ,this.httpOptions );
  }

  // Allergens
  getAllergens(){
    return this._allergens;
  }
  setAllergens(): Observable<any>{
    return this.http.get(this.api + "/allergens" ,this.httpOptions );
  }

  // Wines
  getWines(){return this._wines;}
  setWines(): Observable<any>{return this.http.get(this.api + "/wines" ,this.httpOptions );}
 
  getHighLightedWine(){
    return this.http.get(this.api + "/misc/highlighted_wine" ,this.httpOptions );
  }

  getWinesVarieties(){return this._winesVarieties;}
  setWinesVarieties(): Observable<any>{return this.http.get(this.api + "/wine-varieties" ,this.httpOptions );}
  
  getWinesTypes(){return this._winesTypes;}
  setWinesTypes(): Observable<any>{return this.http.get(this.api + "/wine-types" ,this.httpOptions );}
  
  getWinesDO(){return this._winesDO;}
  setWinesDO(): Observable<any>{return this.http.get(this.api + "/wine-do" ,this.httpOptions );}
 


  // Drinks
  setDrinkTypes(): Observable<any>{
    return this.http.get(this.api + "/drink-types" ,this.httpOptions );
  }
  getDrinkTypes(){
    return this._drinkTypes;
  }


  setDrinks(): Observable<any>{
    return this.http.get(this.api + "/drinks" ,this.httpOptions );
  }

  getDrinks(){
    return this._drinks;
  }


  // Menus
  getMenus(){return this._menus;}
  setMenus(): Observable<any>{                 
    return this.http.get(this.api + "/menus" ,this.httpOptions );
  }

  setCompleteDrinks(): Observable<any>{
    return Observable.forkJoin([
      this.setDrinks().map((res:Response) => res),
      this.setDrinkTypes().map((res:Response) => res)
    ])
    .map((data: any[]) => {
      let drinks: any = data[0];
      let drink_types: any[] = data[1];

      this.drinkTypes.next(drink_types);
      
      for (let D = 0; D < drinks.length; D++) {
        var drink_type = []
            var type = this.getObjectBy( drink_types,drinks[D]['drink_type_id'] );

            if (type.length != [] ){
              drink_type.push(type);
            }

          drinks[D]['drink_type'] = drink_type;
      }
      return  drinks;
    });
  }

  setCompleteWines(): Observable<any>{
    return Observable.forkJoin([
      this.setWines().map((res:Response) => res),
      this.setWinesVarieties().map((res:Response) => res),
      this.setWinesDO().map((res:Response) => res),
      this.setWinesTypes().map((res:Response) => res)
    ])
    .map((data: any[]) => {
      let wines: any = data[0];
      let varieties: any[] = data[1];
      let dos: any[] = data[2];
      let types: any[] = data[3];

      this.winesDO.next(dos);
      this.winesTypes.next(types);
      this.winesVarieties.next(varieties);
      
      for (let w = 0; w < wines.length; w++) {

        let _varieties=[];
        let _type = [];
        let _do = []
        
        var w_t = this.getObjectBy(types,wines[w]['id_wine_type']);
        if (w_t != [] ){
          _type.push(w_t);
        }

        var w_do = this.getObjectBy(dos,wines[w]['id_do']);
        if (w_do.length != [] ){
          _do.push(w_do);
        }

        // add varieties
        for (let v = 0; v < (wines[w]['wineVarieties']).length; v++) {
          var w_v= this.getObjectBy(varieties,wines[w]['wineVarieties'][v]);
          if (w_v.length != [] ){
            _varieties.push(w_v);
          }
        }

        wines[w].wine_varieties = _varieties;
        wines[w].wine_type = _type;
        wines[w].wine_do = _do;
      }
      
      return  wines;
    });
  }

  setCompleteDishes(): Observable<any>{
    return Observable.forkJoin([
      this.setDishes().map((res:Response) => res),
      this.setCategories().map((res:Response) => res),
      this.setFoodTypes().map((res:Response) => res),
      this.setAllergens().map((res:Response) => res)
    ])
    .map((data: any[]) => {
      let dishes: any = data[0];
      let categories: any[] = data[1];
      let foodTypes: any[] = data[2];
      let allergens: any[] = data[3];

      this.allergens.next(allergens);
      this.categories.next(categories);
      this.foodTypes.next(foodTypes);

      
      for (let d = 0; d < dishes.length; d++) {

        let _categories=[];
        let _foodTypes = [];
        let _allergens = []
        

        for (let c = 0; c < (dishes[d]['categories']).length; c++) {
          var d_c= this.getObjectBy(categories,dishes[d]['categories'][c]);
          if (d_c.length != [] ){
            _categories.push(d_c);
          }
        }

        for (let ft = 0; ft < (dishes[d]['foodTypes']).length; ft++) {
          var d_ft= this.getObjectBy(foodTypes,dishes[d]['foodTypes'][ft]);
          if (d_ft.length != [] ){
            _foodTypes.push(d_ft);
          }
        }

        for (let a = 0; a < (dishes[d]['allergens']).length; a++) {
          var d_a= this.getObjectBy(allergens,dishes[d]['allergens'][a]);
          if (d_a.length != [] ){
            _allergens.push(d_a);
          }
        }

        dishes[d].dish_categories = _categories;
        dishes[d].dish_foodTypes = _foodTypes;
        dishes[d].dish_allergens = _allergens;
      }
      
      return  dishes;
    });
  }

  setCompleteMenus(): Observable<any>{
    return Observable.forkJoin([
      this.setMenus().map((res:Response) => res),
      this.setCompleteDishes().map((res:Response) => res),
      this.setCompleteWines().map((res:Response) => res),
    ])
    .map((data: any[]) => {
      let menus: any = data[0];
      let dishes: any[] = data[1];
      let wines: any[] = data[2];

      this.wines.next(wines);
      this.dishes.next(dishes);
      
      for (let m = 0; m < menus.length; m++) {
        let _dishes=[];
        let _wines = [];

        for (let d = 0; d < (menus[m]['dishes']).length; d++) {
          var m_d= this.getObjectBy(dishes,menus[m]['dishes'][d]);
          if (m_d.length != [] ){
            _dishes.push(m_d);
          }
        }

        for (let w = 0; w < (menus[m]['wines']).length; w++) {
          var m_w= this.getObjectBy(wines,menus[m]['wines'][w]);
          if (m_w.length != [] ){
            _wines.push(m_w);
          }
        }
        menus[m].menu_dishes = _dishes;
        menus[m].menu_wines = _wines;
      }
      
      return  menus;
    });
  }

}
