<?php

use Illuminate\Support\Facades\Route;

// All operation admin can do it


Route::get('add-product' , 'App\Http\Controllers\Admin\AdminController@addProduct')->name('admin.add-product');
Route::post('store-product' , 'App\Http\Controllers\Admin\AdminController@storeProduct')->name('admin.storeProduct');
Route::get('add-category' , 'App\Http\Controllers\Admin\AdminController@addCategory')->name('admin.add-category');
Route::post('store-category' , 'App\Http\Controllers\Admin\AdminController@storeCategory')->name('admin.storeCategory');
