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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return redirect('/dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/order', function () {
    return view('pages.order');
})->name('order');

Route::middleware(['auth:sanctum', 'verified'])->get('/order-list', function () {
    return view('pages.order-list');
})->name('order-list');

Route::middleware(['auth:sanctum', 'verified'])->get('/my-orders', function () {
    return view('pages.order-list');
})->name('my-orders');


// Admin routes
Route::middleware('is_admin')->get('/admin/users', function () {
    return view('admin.users');
})->name('admin-users');