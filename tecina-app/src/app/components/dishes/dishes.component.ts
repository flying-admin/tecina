import { Component, OnInit } from '@angular/core';
import { TecinaApiService } from "../../services/tecina-api.service";
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-dishes',
  templateUrl: './dishes.component.html',
  styles: []
})

export class DishesComponent implements OnInit {
  currentLang;
  highlights:any;
  currentFilters;
  dishes;

  constructor(
    public _tecinaApi: TecinaApiService, 
    private route: ActivatedRoute,
    private router: Router,
  ) { }

  resize = function(){
    window.dispatchEvent(new Event('resize'));
  }

  initialiseState(){
    this._tecinaApi.getHighlights(this.currentLang)
    .subscribe( (resp: any) => {
      this.highlights = resp;
    });
    
    this._tecinaApi.getDishes( ).subscribe(dishes => {
      this.dishes = dishes;
  
      this._tecinaApi.currentFilters.subscribe( filters => {
        this.currentFilters = filters;
        //this.getFilteredDishes();
      });
    });
  }

  // getFilteredDishes ( _categories=[] ){
  //   _categories = (_categories.length != 0 ) ? _categories : this.currentFilters.categories;
  //   let _foodTypes = this.currentFilters.foodTypes;
  //   let _allergens = this.currentFilters.allergens;
  //   var _dishes = this.dishes.slice(0);
  //   var _filteredDishes = []; 
    
  //   for (var D = 0; D < _dishes.length; D++) {
  //     var addDish = true;

  //     if( _categories.length != 0 && _dishes[D].categories.length != 0){
  //       var hasCategory = false;
        
  //       // si no tiene la categoria se elimina 
  //       outerloopC:
  //       for (var i = 0; i < _categories.length; i++) {
  //         for (var j = 0; j < _dishes[D].categories.length; j++) {
  //           if(_categories[i] == _dishes[D].categories[j]){
  //             hasCategory = true;
  //             break outerloopC; // finaliza ambos loops
  //           }
  //         }
  //       }

  //       if( hasCategory == false ){
  //         addDish = false
  //       }
  //     }

  //     if( _allergens.length != 0 && _dishes[D].allergens.length != 0 && addDish){
  //       var isAllergen = false;
  //       // si tiene el allergeno se elimina
        
  //       outerloopA:
  //       for (var a = 0; a < _allergens.length; a++) {
  //         for (var b = 0; b < _dishes[D].allergens.length; b++) {
  //           if(_allergens[a] == _dishes[D].allergens[b]){
  //             isAllergen = true;
  //             break outerloopA; // finaliza ambos loops
  //           }
  //         }
  //       }

  //       if( isAllergen ){
  //         addDish = false
  //       }
  //     }

  //     if( _foodTypes.length != 0 && _dishes[D].foodTypes.length != 0 && addDish){
  //         var isFoddType = false;
        
  //         // si no tiene el tipo de comida se elimina
  //         outerloopFT:
  //         for (var l = 0; l < _foodTypes.length; l++) {
  //           for (var m = 0; m < _dishes[D].foodTypes.length; m++) {
  //             if(_foodTypes[l] == _dishes[D].foodTypes[m]){
  //               isFoddType = true;
  //               break outerloopFT; // finaliza ambos loops
  //             }
  //           }
  //         }

  //         if( isFoddType == false ){
  //           addDish = false
  //         }
  //     }

  //     if(addDish){
  //       _filteredDishes.push(_dishes[D]);
  //     }
  //   }     
  //   return  _filteredDishes ;
  // }



  ngOnInit() {
    this._tecinaApi.currentLAng.subscribe(
      resp => {
        this.currentLang = resp;
        this.initialiseState();
      }
    );
  }
}
