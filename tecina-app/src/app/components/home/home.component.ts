import { Component, OnInit, ViewChild } from '@angular/core';
import { TecinaApiService } from "../../services/tecina-api.service";
import { SwiperConfigInterface,SwiperDirective } from 'ngx-swiper-wrapper';


@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styles: []
})
export class HomeComponent implements OnInit   {
  currentLang;
  highlights:any;
  imagesPath;
  mainMenu = false;

  currentConfig: SwiperConfigInterface = {
    speed: 500,
    loop: !0,
    autoplay: {
      delay: 7e3,
      disableOnInteraction: !1
    }
  };
  
  @ViewChild(SwiperDirective) swiperHighlights?: SwiperDirective;


  constructor( 
      private _tecinaApi: TecinaApiService
  ) {    
    this.imagesPath = this._tecinaApi.imagesPath + "/highlights/"; 
    this._tecinaApi._mainMenu.subscribe(
      main_menu => this.mainMenu = main_menu
    );
  }

  goToIndex( i ){
    setTimeout(() => {
      this.swiperHighlights.setIndex(i);
    }, 1000);
  }
  
  initialiseState(){
    this._tecinaApi.getHighlights(this.currentLang).map(
      (resp: any) => {
        return resp;
      }
    )
    .subscribe( (resp: any) => {
      this.highlights = resp;
      this.goToIndex( 0 );
    });
  }
  
  ngOnInit() {
    this._tecinaApi.currentLang.subscribe(
      resp => {
        this.currentLang = resp;
        this.initialiseState();
      }
    );
  }



  mainMenuStatus( open ){
    this._tecinaApi.setMainMenu(open);
  }

}
