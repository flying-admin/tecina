import { Component, OnInit } from '@angular/core';
import { TecinaApiService } from "../../services/tecina-api.service";
import { ActivatedRoute, Router } from '@angular/router';

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
  ) {
  
  }
  
  initialiseState(){
    this._tecinaApi.getHighlights( this.currentLang )
    .subscribe( resp => {
      this.highlights = resp;
      console.log("this.highlights",this.highlights);
    });
  }
  
  ngOnInit() {
    this.route.params.subscribe(params => {
      this.currentLang = params['lang'] || 'es' ;
      console.log("params['lang']" ,params['lang'] ,this.currentLang);
      
      this.initialiseState();

      //this.initialiseState(); // reset and set based on new parameter this time
    });



  }

}
