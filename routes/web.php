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

Route::get('/', 'PagesController@home');
Route::get('/buy/{id}', 'PagesController@buy');
Route::get('/buy/{id}/checkout', 'PagesController@checkout');
Route::post('/order/{id}', 'PagesController@order');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('admin', 'AdminController');

Route::resource('category', 'CategoryController');
Route::get('/category/{id}/view', 'CategoryController@view');

Route::resource('products', 'ProductsController');

Route::get('category/{id}/{slug}', ['as' => 'category.single', 'uses' => 'PagesController@singleCategory'])->where('slug', '[\w\d\-\_]+');
