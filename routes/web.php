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

Route::get('/', 'PagesController@topup_balance');
Route::post('/payment', 'PagesController@payment');
Route::get('/product', 'PagesController@product');
Route::get('/order_history', 'OrdersController@index');
Route::post('/success', 'OrdersController@store');

Route::resource('orders', 'OrdersController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
