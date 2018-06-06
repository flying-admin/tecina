import { Component, OnInit ,OnDestroy} from '@angular/core';
import { TecinaApiService } from "../../services/tecina-api.service";
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styles: []
})
export class HomeComponent implements OnInit , OnDestroy  {
  //defaultLang = "es";
  //currentLang = this.defaultLang;
  currentLang;
  //routeLang;
  //langs;
  highlights:any;
  imgPath = "http://tecina-api.local/public/images";

  resize = function(){
    window.dispatchEvent(new Event('resize'));
  }

  constructor( 
      public _tecinaApi: TecinaApiService, 
      private route: ActivatedRoute,
      private router: Router,
  ) {
    
  }
  
  initialiseState(){
    this._tecinaApi.getHighlights(this.currentLang)
    .subscribe( (resp: any) => {
      this.highlights = resp;
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

  ngOnDestroy() {
  //   if (this.routeLang) {  
  //     this.routeLang.unsubscribe();
  //  }
  }

}
