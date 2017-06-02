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


Route::get('/','RestHomeController@index');


Route::group(['prefix' => 'admin'], function () {
	Route::get('/','AdminController@index');
	Route::resource('menu-top','menuTopController');
	Route::resource('list-food','listFoodController');
	Route::resource('category','categoryController');
	Route::resource('order-table','orderTableController');
	
});

Auth::routes();

