import { Component, OnInit, ViewChild } from '@angular/core';
import { ApiService } from "../../services/api.service";
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

  translations = {
    init:{
      es: 'Toca la pantalla<br>para comenzar',
      en: 'TOUCH SCREEN<br>TO START',
      de: 'Klicken Sie zum Starten<br>auf den Bildschirm'
    }
  }
  
  @ViewChild(SwiperDirective) swiperHighlights?: SwiperDirective;


  constructor( 
      private _api: ApiService
  ) {    
    this.imagesPath = this._api.imagesPath + "/highlights/"; 
    this._api._mainMenu.subscribe(
      main_menu => this.mainMenu = main_menu
    );
  }

  goToIndex( i ){
    setTimeout(() => {
      this.swiperHighlights.setIndex(i);
    }, 1000);
  }
  
  initialiseState(){
    this._api.getHighlights().map(
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
    this._api.currentLang.subscribe(
      resp => {
        this.currentLang = resp;
        this.initialiseState();
      }
    );
  }



  mainMenuStatus( open ){
    this._api.setMainMenu(open);
  }

}
