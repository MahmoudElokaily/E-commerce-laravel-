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



Route::get('/', 'App\Http\Controllers\Product\ProductController@index')->name('home');


Route::get('add-product' , 'App\Http\Controllers\Admin\AdminController@addProduct');
Route::post('store-product' , 'App\Http\Controllers\Admin\AdminController@storeProduct')->name('admin.storeProduct');
Route::get('add-category' , 'App\Http\Controllers\Admin\AdminController@addCategory');
Route::post('store-category' , 'App\Http\Controllers\Admin\AdminController@storeCategory')->name('admin.storeCategory');
Route::get('category/{id}','App\Http\Controllers\Product\ProductController@showCategoryItem')->name('category');
Route::get('about-us' , 'App\Http\Controllers\Product\ProductController@aboutUs')->name('about-us');
Route::get('categories' , 'App\Http\Controllers\Product\ProductController@allCategories') ->name('allCategories');
Route::get('my-cart/{user_id}' , 'App\Http\Controllers\Product\ProductController@myCart')->name('cart');
