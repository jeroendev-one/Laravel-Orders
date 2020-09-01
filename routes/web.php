<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/mijn-bestellingen', 'OrderController@myOrders')->name('myOrders');
Route::get('/alle-bestellingen', 'OrderController@allOrders')->name('allOrders');


Auth::routes();
Route::post('/order', 'OrderController@createOrder')->name('order');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
