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


Route::get('category/{id}','App\Http\Controllers\Product\ProductController@showCategoryItem')->name('category');
Route::get('about-us' , 'App\Http\Controllers\Product\ProductController@aboutUs')->name('about-us');
Route::get('categories' , 'App\Http\Controllers\Product\ProductController@allCategories') ->name('allCategories');
Route::get('my-cart/{user_id}' , 'App\Http\Controllers\Product\ProductController@myCart')->name('cart');
Route::get('add-to-cart/{id}' , 'App\Http\Controllers\Product\ProductController@addToMyCart')->name('addToMyCart');
Route::get('my-profile/{user_id}' ,'App\Http\Controllers\Product\ProductController@myProfile')->name('myProfile');
Route::post('update-user/{id}' , 'App\Http\Controllers\Product\ProductController@updateUser')->name('updateUser');
Route::get('contact-us' , 'App\Http\Controllers\Product\ProductController@contactUs')->name('contact-us');
Route::post('send-mail' , 'App\Http\Controllers\Product\ProductController@sendMailContactUs')->name('send-mail-contact-us')->middleware('login');
Route::get('checkout/{id}','App\Http\Controllers\Product\ProductController@checkout')->name('product.checkout')->middleware('login');
Route::post('checkout-done/{id}' , 'App\Http\Controllers\Product\ProductController@checkoutDone')->name('product.checkout-done');
