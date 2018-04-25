<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// https://itsolutionstuff.com/post/laravel-52-api-using-jwt-authentication-tutorial-from-scratch-exampleexample.html

//Route::group(['middleware' => ['api','cors'],'prefix' => 'api'], function () {
//    Route::post('register', 'APIController@register');
//    Route::post('login', 'APIController@login');
//    Route::group(['middleware' => 'jwt-auth'], function () {
//        Route::post('get_user_details', 'APIController@get_user_details');
//    });
//});


//Route::group(['middleware' => ['api' ,'cors']], function () {
//
//    Route::group(['middleware' => 'jwt-auth'], function () {
//        Route::resources([
//            'dish' => 'DishController',
//        ]);
//    });
//
//});


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');


});

Route::group(['middleware' => 'auth:api'], function () {

    Route::resources([
        'dish' => 'DishController',
    ]);

});