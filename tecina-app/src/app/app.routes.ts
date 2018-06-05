import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './components/home/home.component'

const appRoutes: Routes = [
 // { path: 'menus/', component: MenusComponent },
  { path: 'home',      component: HomeComponent,   runGuardsAndResolvers: 'always'},
  { path: 'home/:lang',      component: HomeComponent ,   runGuardsAndResolvers: 'always'},
  { path: '', redirectTo: 'home',
    pathMatch: 'full',
    runGuardsAndResolvers: 'always'
  },
  { path: '**', redirectTo: '/home'}
];

export const AppRouting = RouterModule.forRoot(appRoutes,{onSameUrlNavigation: 'reload'}); // is a Routes "Module" impor this const in app.modules like a modul