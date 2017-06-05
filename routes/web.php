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
	Route::resource('menu-top','MenuTopController');
	Route::resource('list-food','ListFoodController');
	Route::resource('category','CategoryController');
	Route::resource('order-table','OrderTableController');
	
});

Auth::routes();

