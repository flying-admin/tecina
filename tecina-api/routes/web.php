<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/menu', 'HomeController@listMenu')->name('menu');
Route::get('/wine', 'HomeController@listWine')->name('wine');


/*Menu admin*/
Route::get('/deleteDishFromMenu/{dishId}/{menuId}','MenuController@deleteDishMenu')->middleware('auth');
Route::get('/addDishFromMenu/{dishId}/{menuId}','MenuController@addDishMenu')->middleware('auth');
Route::get('/deleteWineFromMenu/{wineId}/{menuId}','MenuController@deleteWineMenu')->middleware('auth');
Route::get('/addWineFromMenu/{wineId}/{menuId}','MenuController@addWineMenu')->middleware('auth');
Route::post('/uploadMenuImage/{menuId}','MenuController@uploadMenuImage')->middleware('api','auth')->name('uploadMenuImage');
Route::get( '/uploadMenuImage/{menuId}','MenuController@uploadMenuImage')->middleware('api','auth');

/*Wine admin*/
Route::get('/addWineVariety/{wineId}/{varietyId}','WineController@addWineVariety')->middleware('auth');
Route::get('/deleteWineVariety/{wineId}/{varietyId}','WineController@deleteWineVariety')->middleware('auth');
// Route::post('/uploadMenuImage/{menuId}','MenuController@uploadMenuImage')->middleware('auth');
