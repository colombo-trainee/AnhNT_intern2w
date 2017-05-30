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
Route::get('home','RestHomeController@index');
Route::get('admin', function () {
	return view('layouts.layout');
});

Route::get('menu-food','listFoodController@view_menu_food');
Route::get('the-loai/{id}/{alias}','RestHomeController@getMenu');
Route::group(['prefix' => 'admin'], function () {
	Route::get('/', function () {
		return view('layouts.layout');
	});
	Route::resource('menu-top','menuTopController');
	Route::resource('list-food','listFoodController');
	Route::resource('category','categoryController');
	Route::resource('order-table','orderTableController');
	
});
