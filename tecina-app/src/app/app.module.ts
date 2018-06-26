import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { HomeComponent } from './components/home/home.component';
import { NavbarComponent } from './components/shared/navbar/navbar.component';
import { TimesPipe } from './pipes/times.pipe'; 

// modules
import  { AppRouting } from './app.routes'; 
import { HttpClientModule } from "@angular/common/http";


// services
import { TecinaApiService } from "./services/tecina-api.service";
import { DishesComponent } from './components/dishes/dishes.component';
import { DishComponent } from './components/dish/dish.component';

// swiper
import { SwiperModule , SWIPER_CONFIG ,SwiperConfigInterface } from 'ngx-swiper-wrapper';
import { InarrayPipe } from './pipes/inarray.pipe';
import { MenusComponent } from './components/menus/menus.component';
import { MenuComponent } from './components/menu/menu.component';

const DEFAULT_SWIPER_CONFIG: SwiperConfigInterface = {
  speed: 500
};

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    NavbarComponent,
    DishesComponent,
    DishComponent,
    TimesPipe,
    InarrayPipe,
    MenusComponent,
    MenuComponent
  ],
  imports: [
    BrowserModule,
    AppRouting,
    HttpClientModule,
    SwiperModule
  ],
  providers: [
    TecinaApiService,
    {
      provide: SWIPER_CONFIG,
      useValue: DEFAULT_SWIPER_CONFIG
    }
  ],
  bootstrap: [AppComponent]
})

export class AppModule { }
