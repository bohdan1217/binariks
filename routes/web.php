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


Route::get('/', 'MainController@mainPage')->name('main');
Route::resource('orders', 'MainController')->names('orders');
Route::get('/orders/destroy/{id}','MainController@destroy')->name('orders.destroy');
