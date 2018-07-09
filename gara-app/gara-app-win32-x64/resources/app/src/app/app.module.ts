import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { HomeComponent } from './components/home/home.component';
import { NavbarComponent } from './components/shared/navbar/navbar.component';
import { MenusComponent } from './components/menus/menus.component';
import { MenuComponent } from './components/menu/menu.component';
import { DishesComponent } from './components/dishes/dishes.component';
import { DishComponent } from './components/dish/dish.component';
import { WinesComponent } from './components/wines/wines.component';
import { DrinksComponent } from './components/drinks/drinks.component';
import { DefaultImageDirective } from './directives/default-image.directive';

// modules
import  { AppRouting } from './app.routes'; 
import { HttpClientModule } from "@angular/common/http";
import { SwiperModule , SWIPER_CONFIG ,SwiperConfigInterface } from 'ngx-swiper-wrapper'; // swiper

// services
import { ApiService } from "./services/api.service";

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
    MenusComponent,
    MenuComponent,
    WinesComponent,
    DrinksComponent,
    DefaultImageDirective
  ],
  imports: [
    BrowserModule,
    AppRouting,
    HttpClientModule,
    SwiperModule
  ],
  providers: [
    ApiService,
    {
      provide: SWIPER_CONFIG,
      useValue: DEFAULT_SWIPER_CONFIG
    }
  ],
  bootstrap: [AppComponent]
})

export class AppModule { }
