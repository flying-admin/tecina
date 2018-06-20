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

  url = 'http://tecina-api.local/api';
  //url = 'http://tecina-api.local:8000/api';
  
  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type':  'application/json',
      'Accept': 'application/json',
    })
  };

  constructor( public http:HttpClient) {
    console.log('servicio activo');
  }

  getHighlights( lang ){
    this.http.get(this.url + "/highlights" ,this.httpOptions ).map( resp => console.log("/highlights",resp)); 
    let highlights = this.http.get(this.url + "/highlights" ,this.httpOptions ); 
    return  highlights;
  }

  setCurrentLAng( lang ){
    this.lang.next(lang);
  }

  setCurrentFilters( filters ){
    this.filters.next( filters );
  }

  getDishes(){
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
    let dishes = this.http.get(this.url + "/dishes" ,this.httpOptions )
   
    return dishes;
  }


  getLanguages(){
    let languages = this.http.get(this.url + "/languages" ,this.httpOptions ); 
    //[{"id":1,"code":"es"},{"id":2,"code":"fr"}]
    return languages;
  }

  getCategories(){
    let categories = this.http.get(this.url + "/categories" ,this.httpOptions ); 
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
    //   },
    //   {
    //       "id": 2,
    //       "translate": {
    //           "es": {
    //               "name": "es_entrantes calientes",
    //               "description": "es_entrantes calientes description"
    //           },
    //           "fr": {
    //               "name": "fr_entrantes calientes",
    //               "description": "fr_entrantes calientes description"
    //           }
    //       }
    //   }
    // ]
    return categories;
  }

  getFoodTypes(){
    let foodTypes = this.http.get(this.url + "/food-types" ,this.httpOptions ); 
    // [
    //   {
    //       "id": 1,
    //       "translate": {
    //           "es": "es_comida vegana",
    //           "fr": "fr_comida vegana"
    //       }
    //   }
    // ]
    return foodTypes;
  }

  getAllergens(){
    let allergens = this.http.get(this.url + "/allergens" ,this.httpOptions ).map(
      resp => {return resp}
    ); 
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
    return allergens;
  }
}
