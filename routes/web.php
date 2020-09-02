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


// Admin routes
Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');
Route::get('/admin/users', 'AdminController@users')->middleware('is_admin')->name('users');
Route::get('/admin/users/delete/{{ user }}', 'AdminController@deleteUser')->middleware('is_admin')->name('deleteUser');