import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './components/home/home.component'

const appRoutes: Routes = [
 // { path: 'menus/', component: MenusComponent },
  { path: 'home',      component: HomeComponent },
  // {
  //   path: 'heroes',
  //   component: HeroListComponent,
  //   data: { title: 'Heroes List' }
  // },
  { path: '',
    redirectTo: 'home',
    pathMatch: 'full'
  },
  { path: '**', redirectTo: '/'}
  //{ path: '**', component: PageNotFoundComponent }
];

export const AppRouting = RouterModule.forRoot(appRoutes); // is a Routes "Module" impor this const in app.modules like a modul