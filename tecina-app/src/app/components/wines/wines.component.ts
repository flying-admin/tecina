import { Component, OnInit, ViewChild } from '@angular/core';
import { TecinaApiService } from "../../services/tecina-api.service";
import { SwiperDirective, SwiperConfigInterface } from 'ngx-swiper-wrapper';
import { Observable } from 'rxjs';



@Component({
  selector: 'app-wines',
  templateUrl: './wines.component.html',
  styles: []
})

export class WinesComponent implements OnInit {
  currentLang: string = 'es';
  wines: any[] = [];
  wineVarieties: any[] = [];
  wineType: any[] = [];
  wineDO: any[] = [];
  allergens;

  imagesPath;

  currentConfig: SwiperConfigInterface = {
    observer: true,
    a11y: true,
    direction: 'vertical',
    speed: 500,
    freeMode: true,
    freeModeSticky: true,
    slidesPerView: 3,
    navigation: {
      prevEl: '.wine-list__nav--prev',
      nextEl: '.wine-list__nav--next',
      disabledClass: 'wine-list__nav--disabled'
    }
  };

  translations = {
    wines: {
      variety:{
        es: 'Variedad',
        fr: 'Variedad-FR',
        en: 'Variedad-EN'
      }
    },
    filters: {}
  };

  @ViewChild(SwiperDirective) swiperWines?: SwiperDirective;

  constructor(
    private _tecinaApi: TecinaApiService
  ) {
    this.imagesPath = this._tecinaApi.imagesPath + "/wines/";
  }

  initialiseState() {

    this._tecinaApi.getWines()
    .subscribe(
      (wines:any) => {
        this.wines =  this._tecinaApi.subArray( wines ,2);
        this.goToIndex(0);
      });
    
    this._tecinaApi.getWinesVarieties().subscribe(wineVarieties => {
      this.wineVarieties = wineVarieties;
    });

    this._tecinaApi.getWinesDO().subscribe(wineDO => {
      this.wineDO = wineDO;
    }); 

    this._tecinaApi.getWinesTypes().subscribe(wineType => {
      this.wineType = wineType;
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


  goToIndex(i) {
    setTimeout(() => {
      this.swiperWines.setIndex(i);
    }, 1000);
  }

  getDO( id_do ){    
    return this._tecinaApi.getObjectBy(this.wineDO , id_do,'name');

    // if (this.wineDO.length > 0) {
    //   var do_name = this.wineDO.filter(
    //     a => { return a.id == id_do }
    //   );
    //   return do_name[0]['name'];
    // } else {
    //   return [];
    // }
  }

  getVariety( wine_varieties ,lang ){   
    console.log("getVariety"); 
    if (this.wineVarieties.length > 0) {
      var varieties = [];
      for (let v = 0; v < wine_varieties.length; v++) {
        var variety = this.wineVarieties.filter(
          a => { return a.id == wine_varieties[v] }
        );
        varieties.push( variety[0].translate[lang]);
      }
     
      return varieties.join(', ');
      
    } else {
      return [];
    }
  }

}
