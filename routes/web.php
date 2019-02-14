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

use \App\Http\Controllers\PageController;

Route::get('/', 'TripController@index');
Route::get('/about', 'PageController@about');
Route::get('/trips/{tripId?}', 'TripController@show');

//Routes protégées par le middleware auth
Route::get('/account', 'UserController@index');
Route::post('/booking/add', 'BookingController@create');
Route::delete('/booking/delete/{tripId?}', 'BookingController@deleteOne');
Route::delete('/booking/deleteAll', 'BookingController@deleteAll');


//Route protégées par le middleware admin
Route::group(['prefix'=>'admin'], function(){
    Route::get('/', 'AdminController@read');
    Route::get('create', 'AdminController@create');
    Route::get('update/{tripId?}', 'AdminController@update');

    Route::post('create', 'TripController@create');
    Route::put('update/{tripId?}', 'TripController@update');
    Route::delete('delete/{tripdId?}', 'TripController@delete');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
