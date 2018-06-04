import { Component, OnInit } from '@angular/core';
import { TecinaApiService } from "../../../services/tecina-api.service";
import { ActivatedRoute, Router } from '@angular/router';
import { StorageService } from "../../../services/storage-service.service";

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styles: []
})

export class NavbarComponent implements OnInit {
  defaultLang = "es";
  currentLang = this.defaultLang;
  langs;
  categories;

  filters = {
    category : [],
  }

  constructor( 
      public _tecinaApi:TecinaApiService ,
      private route: ActivatedRoute,
      private router: Router,
      public _localStorage: StorageService
    ) { 
        this.langs  = this._tecinaApi.getLanguages();
        this.categories  = this._tecinaApi.getCategories();
  }

  ngOnInit() {
    this.route
      .queryParams
      .subscribe(params => {
        if(params['lang']){
          console.log("params" , params);
          this.currentLang = params['lang'] ;
        }
        console.log(this.currentLang);
        //localStorage.setItem('currentLang', this.currentLang);
        this._localStorage.store('currentLang' , this.currentLang);
        console.log("cambia servicio" ,this._localStorage.changes);

      });
  }

}
