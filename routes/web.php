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


Auth::routes();
Route::namespace('Admin')->group(function () {
    Route::get('/admin', 'AdminHomeController@home');
    Route::resource('brand', 'BrandController');
    Route::resource('size', 'SizeController');
    Route::resource('shop', 'ShopController');
    Route::resource('color', 'ColorController');
    Route::resource('product', 'ProductController');
    Route::post('/storeProductImage', 'ProductController@storeProductImage')->name('storeProductImage');
    Route::post('/updateProductImage', 'ProductController@updateProductImage')->name('updateProductImage');
    Route::post('/deleteProductImage', 'ProductController@deleteProductImage')->name('deleteProductImage');

});
