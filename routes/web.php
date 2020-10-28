<?php

use Illuminate\Support\Facades\Route;

// Admin routes
require('admin.php');

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

Route::middleware(['auth:sanctum', 'verified'])->get('/update-payment', function () {
   return view('pages.update-payment');
})->name('update-payment');



