import { Component, OnInit, ViewChild } from '@angular/core';
import { TecinaApiService } from "../../services/tecina-api.service";
import { SwiperDirective, SwiperConfigInterface } from 'ngx-swiper-wrapper';


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
  };

  wines: any[] = [];
  wineVarieties: any[] = [];
  wineTypes: any[] = [];
  wineDO: any[] = [];
  allWines = [];
  imagesPath:string;
  no_results:boolean = false ;
  winesReady:boolean = false;
  translations = {
    wines: {
      page_title:{
        es: 'Carta de vinos',
        fr: 'Carta de vinos-FR',
        en: 'Carta de vinos-EN'
      },
      variety:{
        es: 'Variedad',
        fr: 'Variedad-FR',
        en: 'Variedad-EN'
      },
      do:{
        es: 'D. O.',
        fr: 'D. O.-FR',
        en: 'D. O.-EN'
      },
      filters: {
        type:{
          es: 'Tipo de vino',
          fr: 'Tipo de vino-FR',
          en: 'Tipo de vino-EN'
        },
        do_title:{
          es: 'Denominaciones de origen',
          fr: 'Denominaciones de origen-FR',
          en: 'Denominaciones de origen-EN'
        },
        do_section_1:{
          es: 'Peninsula',
          fr: 'Peninsula-FR',
          en: 'Peninsula-EN'
        },
        do_section_2:{
          es: 'Islas Canarias',
          fr: 'Islas Canarias-FR',
          en: 'Islas Canarias-EN'
        },
        button:{
          es: 'Limpiar filtros',
          fr: 'Limpiar filtros-FR',
          en: 'Limpiar filtros-EN'
        },
      }
    },
  };

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



  @ViewChild(SwiperDirective) swiperWines?: SwiperDirective;

  constructor( private _tecinaApi: TecinaApiService) {
    this.imagesPath = this._tecinaApi.imagesPath + "/wines/";
  }

  initialiseState() {
    this._tecinaApi.getWinesDO().flatMap(
      (winesDO: any) => {
        return this._tecinaApi.getWines()
          .map((wines: any) => {
            wines;
            this.allWines = wines;
            let wines_do = [];
            let used_do = [];
            for (let w = 0; w < wines.length; w++) {
              if( wines_do.indexOf(wines[w].id_do) == -1){
                wines_do.push(wines[w].id_do);
                var el = this._tecinaApi.getObjectBy(winesDO,wines[w].id_do)
                if( el  !== []){
                  used_do.push(el);
                }
              }
            }
            this.wineDO = used_do;
            return this._tecinaApi.subArray(wines, 2);
          });
    })
    .subscribe(
      (wines:any) => {
        this.wines = wines;
        this.goToIndex(0);
        if(this.wines.length > 0){
          this.winesReady = true;
        }
    });
    
    this._tecinaApi.getWinesVarieties().subscribe(wineVarieties => {
      this.wineVarieties = wineVarieties;
    });

    this._tecinaApi.getWinesTypes().subscribe(wineTypes => {
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

 
  clearFilters(){
    this.winesFilters.wineTypes = [] ;
    this.winesFilters.wineDO = [];
    this.wines = this._tecinaApi.subArray( this.allWines ,2);
    this.goToIndex(0,300);
  }

  inArray(value, args) {
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

  getFilteredWines() {
    let _filters = this.winesFilters;
    let _wineTypes = _filters.wineTypes;
    let _wineDO = _filters.wineDO;
    let _wines = (this.allWines).slice(0);
    let _filteredWines = [];

    
      for (var W = 0; W < _wines.length; W++) {
        var addWine = true;

        if (_wineTypes.length != 0 && _wines[W].id_wine_type != null && _wineTypes.indexOf(_wines[W].id_wine_type) == -1) {
          addWine = false;
        }

        if (_wineDO.length != 0 && _wines[W].id_do != null && _wineDO.indexOf(_wines[W].id_do) == -1) {
          addWine = false;
        }

        if (addWine) {
          _filteredWines.push(_wines[W]);
        }

      }

    this.no_results =  (_filteredWines.length == 0)? true : false;

    this.wines = this._tecinaApi.subArray(_filteredWines, 2);
    this.goToIndex(0, 500);
  }

}
