import { Component, OnInit ,OnDestroy} from '@angular/core';
import { TecinaApiService } from "../../services/tecina-api.service";
import { SwiperConfigInterface } from 'ngx-swiper-wrapper';


@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styles: []
})
export class HomeComponent implements OnInit , OnDestroy  {
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
  

  resize = function(){
    window.dispatchEvent(new Event('resize'));
  }

  constructor( 
      private _tecinaApi: TecinaApiService
  ) {    
    this.imagesPath = this._tecinaApi.imagesPath + "/highlights/"; 
    
    this._tecinaApi._mainMenu.subscribe(
      main_menu => this.mainMenu = main_menu
    );
  }
  
  initialiseState(){
    this._tecinaApi.getHighlights(this.currentLang)
    .subscribe( (resp: any) => {
      this.highlights = resp;
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

  ngOnDestroy() {
  //   if (this.routeLang) {  
  //     this.routeLang.unsubscribe();
  //  }
  }

  mainMenuStatus( open ){
    this._tecinaApi.setMainMenu(open);
  }

}
