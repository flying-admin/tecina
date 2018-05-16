import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from "@angular/common/http";
import  "rxjs/add/operator/map";

@Injectable()
export class TecinaApiService {
  token:any;

  httpOptionsAuth = {
    headers: new HttpHeaders({
      'Content-Type':  'application/json',
      'Authorization': 'Bearer '+this.token,
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

  getToken(){
    let url = 'http://tecina-api.local/api/auth/login';
    let body = {
      email:'api@tecina.es',
      password: 'admin123'
    };

    return this.http.post(url,body, this.httpOptions ).map( (resp:any) => { return resp.access_token }); 
  }

  getHighlights(){
    let my_token = '';
    this.getToken().subscribe(token => { console.log(token) });
    let url = '';
    let body = [];
    
    //this.http.post(url,body, this.httpOptionsAuth ).subscribe( resp => { console.log(resp)} ) ;
  }

}
