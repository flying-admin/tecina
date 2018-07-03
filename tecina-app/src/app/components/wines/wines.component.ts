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

  winesFilters = {
    wineTypes: [] ,
    wineDO: []
  }

  wines: any[] = [];
  wineVarieties: any[] = [];
  wineTypes: any[] = [];
  wineDO: any[] = [];
  allergens;
  allWines = [];

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

    this._tecinaApi.getWines().map(
      wines => { 
        this.allWines = wines;
        return this._tecinaApi.subArray( wines ,2);
    })
    .subscribe(
      (wines:any) => {
        this.wines =  wines;
        this.goToIndex(0);
      });
    
    this._tecinaApi.getWinesVarieties().subscribe(wineVarieties => {
      this.wineVarieties = wineVarieties;
    });

    this._tecinaApi.getWinesDO().subscribe(wineDO => {
      this.wineDO = wineDO;
    }); 

    this._tecinaApi.getWinesTypes().subscribe(wineTypes => {
      console.log("wineTypes")
      this.wineTypes = wineTypes;
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


  inArray(value, args) {
    console.log("in Array");
    
    if ((value.findIndex(element => { return element == args })) != -1) {
      return true;
    } else {
      return false;
    }
  }

  goToIndex(i , delay=1000) {
    setTimeout(() => {
      this.swiperWines.setIndex(i);
    }, delay);
  }



  changeWinesFilters(filterType: string, filterId: string, isChecked: boolean) {
    console.log("changeWinesFilters");

    let index = this.winesFilters[filterType].indexOf(filterId);
    let change = false;

    if (isChecked) {
      if (index == -1) {
        change = true;
        this.winesFilters[filterType].push(filterId);
      }
    } else {
      if (index != -1) {
        change = true;
        this.winesFilters[filterType].splice(index, 1);
      }
    }

    change && this.getFilteredWines();
  }

  getFilteredWines(){
    let _filters = this.winesFilters;
    let _wineTypes = _filters.wineTypes;
    let _wineDO = _filters.wineDO;
    let _wines = (this.allWines).slice(0);
    let _filteredWines = [];
    console.log(_filters);

    for (var W = 0; W < _wines.length; W++) {
      var addWine = true;

      if( _wineTypes.length != 0 && _wines[W].id_wine_type != null && _wineTypes.indexOf(_wines[W].id_wine_type) == -1){
        addWine = false;
      }

      if( _wineDO.length != 0 && _wines[W].id_do != null && _wineDO.indexOf(_wines[W].id_do) == -1){
        addWine = false;
      }

      if(addWine){
        _filteredWines.push(_wines[W]);
      }

    }

    this.wines = this._tecinaApi.subArray( _filteredWines ,2);
    this.goToIndex(0 , 500) ;
  }

}
