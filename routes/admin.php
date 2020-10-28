<?php

use Illuminate\Support\Facades\Route;

// Admin routes

Route::middleware('is_admin')->get('/admin/users', function () {
    return view('admin.users');
})->name('admin-users');

Route::middleware('is_admin')->get('/admin/orders', function () {
    return view('admin.order-list');
})->name('admin-order-list');

Route::middleware('is_admin')->get('/admin/restaurants/list', function () {
    return view('admin.restaurants-list');
})->name('admin-restaurants-list');

Route::middleware('is_admin')->get('/admin/restaurants/add', function () {
    return view('admin.restaurants-form');
})->name('admin-restaurants-form');