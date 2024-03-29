import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './components/home/home.component'
import { DishesComponent } from './components/dishes/dishes.component'
import { DishComponent } from './components/dish/dish.component'
import { MenusComponent } from './components/menus/menus.component'
import { MenuComponent } from './components/menu/menu.component'
import { WinesComponent } from './components/wines/wines.component'
import { DrinksComponent } from './components/drinks/drinks.component'

const appRoutes: Routes = [
  { path: 'home',      component: HomeComponent,   runGuardsAndResolvers: 'always'},
  { path: 'dishes', component: DishesComponent, runGuardsAndResolvers: 'always'},
  { path: 'dish/:id', component: DishComponent, runGuardsAndResolvers: 'always'},
  { path: 'menus', component: MenusComponent, runGuardsAndResolvers: 'always'},
  { path: 'menu/:id', component: MenuComponent, runGuardsAndResolvers: 'always'},
  { path: 'wines', component: WinesComponent, runGuardsAndResolvers: 'always'},
  { path: 'drinks', component: DrinksComponent, runGuardsAndResolvers: 'always'},
  { path: '', redirectTo: 'home',
    pathMatch: 'full',
    runGuardsAndResolvers: 'always'
  },
  { path: '**', redirectTo: '/home'}
];

export const AppRouting = RouterModule.forRoot(appRoutes,{onSameUrlNavigation: 'reload'}); // is a Routes "Module" impor this const in app.modules like a modul