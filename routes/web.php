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

use Illuminate\Support\Facades\Route;
Route::group(['namespace'=>'Web'],function (){
//    Route::group(['prefix'=>'admin'],function (){
//        Route::get('index','AdminController@index');
//        Route::get('create','AdminController@create');
//    });
    Route::get('autocomplete','AutoCompleteController@index');
    Route::get('autocomplete/search','AutoCompleteController@search');
    Route::post('autocomplete/send','AutoCompleteController@store');
});
//Route::get('/{any}', 'SpaController@index')->where('any', '.*');
//Route::get('/users', function () {
//    return factory('App\User', 10)->make();
//});
