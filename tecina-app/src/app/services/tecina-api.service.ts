import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from "@angular/common/http";
import  "rxjs/add/operator/map";

@Injectable()
export class TecinaApiService {
  token:any = "";
  url = 'http://tecina-api.local/api';
  apiCredentials = {
    email:'api@tecina.es',
    password: 'admin123'
  };

  currentLang = "es";

  httpOptionsAuth = {
    headers: new HttpHeaders({
      'Content-Type':  'application/json',
      // 'Authorization': 'Bearer '+this.token,
      'Accept': 'application/json',
    })
  };

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type':  'application/json',
      'Accept': 'application/json',
    })
  };

  constructor( public http:HttpClient) {
    console.log('servicio activo');
  }

  // getToken(){
  //   this.http.post(this.url + "/auth/login" ,this.apiCredentials, this.httpOptions ).subscribe( (resp:any) => { this.token = resp.access_token; console.log("resp",resp); }); 
  // }

  getHighlights(){
    // let my_token = '';
    // this.getToken().subscribe(token => { console.log(token) });
    // let url = '';
    // let body = [];

    let highlights = this.http.get(this.url + "/highlights" ,this.httpOptions ); 

    //   [
    //     {
    //       image : '/assets/images/content/home/intro_dish1.png',
    //       lang: {
    //         es : {  
    //           name : 'Jamón iberico de bellota 5J cortado cortado a mano,<br />con pan payes y tomate en aove',
    //           category : 'Entrantes frios'
    //         },
    //         fr : {
    //           name : 'Jamón iberico de bellota 5J cortado cortado a mano,<br />con pan payes y tomate en aove',
    //           category : 'Entrantes frios'
    //         },
    //         en : {
    //           name : 'Jamón iberico de bellota 5J cortado cortado a mano,<br />con pan payes y tomate en aove',
    //           category : 'Entrantes frios'
    //         }
    //       }
    //     },
    //   {
    //     image : '/assets/images/content/home/intro_dish2.png',
    //     name : 'Coca de foie con reduccion de PX<br />y cebolla caramelizada 1u',
    //     category : 'Entrantes calientes'
    //   },
    //   {
    //     image : '/assets/images/content/home/intro_dish3.png',
    //     name : 'Langostinos tigre con ajo y guindilla<br />servidos con tostas de pan 4u',
    //     category : 'Pescados'
    //   }
    // ];

     return  highlights;
    //this.http.post(url,body, this.httpOptionsAuth ).subscribe( resp => { console.log(resp)} ) ;
  }

  getLanguages(){
    let languages = ['es','en','fr'];
    return languages;
  }

  getCategories( ){
    let categories = {
        es : ["Entrantes calientes","Pescados","Carnes","Postres" ],
        fr : ["Entrantes calientes-fr","Pescados-fr","Carnes-fr","Postres-fr" ],
        en : ["Entrantes calientes-en","Pescados-en","Carnes-en","Postres-en" ]
    };

    return categories;
  }

  getDishes(){
    let dishes = [
      {
        id: 1,
        img: ["https://tecina-api.local/imgages/dishes/1.jpg"],
        categories: [1 ,2 ,5],
        allergens: [2,4,5],
        types: [1,2,5],
        lang: {
          es:{
            name: "plato1",
            description: "descripcion plato1",
          },
          fr: {
            name: "plato1-fr",
            description: "descripcion plato1-fr",
          },
          en: {
            name: "plato1-en",
            description: "descripcion plato1-en",
          }
        }
      },
      {
        id: 2,
        img: ["https://tecina-api.local/imgages/dishes/2.jpg"],
        categories: [1 ,2 ,5],
        allergens: [2,4,5],
        types: [1,2,5],
        lang: {
          es:{
            name: "plato2",
            description: "descripcion plato2",
          },
          fr: {
            name: "plato2-fr",
            description: "descripcion plato2-fr",
          },
          en: {
            name: "plato2-en",
            description: "descripcion plato2-en",
          }
        }
      },
      {
        id: 3,
        img: ["https://tecina-api.local/imgages/dishes/3.jpg"],
        categories: [1 ,2 ,5],
        allergens: [2,4,5],
        types: [1,2,5],
        lang: {
          es:{
            name: "plato3",
            description: "descripcion plato3",
          },
          fr: {
            name: "plato3-fr",
            description: "descripcion plato3-fr",
          },
          en: {
            name: "plato3-en",
            description: "descripcion plato3-en",
          }
        }
      },
      {
        id: 4,
        img: ["https://tecina-api.local/imgages/dishes/4.jpg"],
        categories: [1 ,2 ,5],
        allergens: [2,4,5],
        types: [1,2,5],
        lang: {
          es:{
            name: "plato4",
            description: "descripcion plato4",
          },
          fr: {
            name: "plato4-fr",
            description: "descripcion plato4-fr",
          },
          en: {
            name: "plato4-en",
            description: "descripcion plato4-en",
          }
        }
      },
      {
        id: 5,
        img: ["https://tecina-api.local/imgages/dishes/5.jpg"],
        categories: [1 ,2 ],
        allergens: [1,3],
        types: [1],
        lang: {
          es:{
            name: "plato5",
            description: "descripcion plato5",
          },
          fr: {
            name: "plato5-fr",
            description: "descripcion plato5-fr",
          },
          en: {
            name: "plato5-en",
            description: "descripcion plato5-en",
          }
        }
      },

    ];
    
  }
}
