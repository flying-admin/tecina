import { Component, OnInit } from '@angular/core';
import { TecinaApiService } from "../../services/tecina-api.service";
import { ActivatedRoute, Router } from '@angular/router';
import { StorageService } from "../../services/storage-service.service";


@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styles: []
})
export class HomeComponent implements OnInit {
  currentLang:string;
  langs;
  highlights:any;
  imgPath = "http://tecina-api.local/public/images";
  resize = function(){
    window.dispatchEvent(new Event('resize'));
  }

  constructor( 
      public _tecinaApi:TecinaApiService, 
      private route: ActivatedRoute,
      private router: Router,
      public _localStorage: StorageService
  ) {
    this._tecinaApi.getHighlights()
      .subscribe( resp => {
        this.highlights = resp;
      });
    
  }
  
  ngOnInit() {
    //this.currentLang = localStorage.getItem('currentLang');

    this.currentLang = 'es'
    console.log("lang on home" , this.currentLang);
    console.log("cambia home" , this._localStorage.changes);
    // this.route
    //   .queryParams
    //   .subscribe(params => {
    //     if(params['lang']){
    //       console.log("params" , params);
    //       this.currentLang = params['lang'] ;
    //     }
       

    //   });
  }

}
