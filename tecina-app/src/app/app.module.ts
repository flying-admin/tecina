import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';


import { AppComponent } from './app.component';
import { HomeComponent } from './components/home/home.component';
import { HeaderComponent } from './components/shared/header/header.component';
import { NavbarComponent } from './components/shared/navbar/navbar.component';

// modules
import  { AppRouting } from './app.routes'; 
import { HttpClientModule } from "@angular/common/http";


// services
import { TecinaApiService } from "./services/tecina-api.service";
import { StorageService } from "./services/storage-service.service"; 

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    HeaderComponent,
    NavbarComponent
  ],
  imports: [
    BrowserModule,
    AppRouting,
    HttpClientModule
  ],
  providers: [
    TecinaApiService,
    StorageService
  ],
  bootstrap: [AppComponent]
})

export class AppModule { }
