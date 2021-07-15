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
Route::get('/', function () {

    return view('welcome');
});
Route::namespace('Admin')->group(function () {
    Route::get('/admin', 'AdminHomeController@home');
    //setup
    Route::resource('brand', 'BrandController');
    Route::resource('size', 'SizeController');
    Route::resource('shop', 'ShopController');
    Route::resource('color', 'ColorController');
    //product
    Route::resource('product', 'ProductController');
    Route::post('/storeProductImage', 'ProductController@storeProductImage')->name('storeProductImage');
    Route::post('/updateProductImage', 'ProductController@updateProductImage')->name('updateProductImage');
    Route::post('/deleteProductImage', 'ProductController@deleteProductImage')->name('deleteProductImage');
    
    Route::post('/storeFeature', 'ProductController@storeFeature')->name('storeFeature');
    Route::post('/updateFeature', 'ProductController@updateFeature')->name('updateFeature');
    Route::post('/deleteFeature', 'ProductController@deleteFeature')->name('deleteFeature');
    Route::post('/storeProductColor', 'ProductController@storeProductColor')->name('storeProductColor');
    Route::post('/updateProductColor', 'ProductController@updateProductColor')->name('updateProductColor');
    Route::post('/deleteProductColor', 'ProductController@deleteProductColor')->name('deleteProductColor');
    Route::post('/storeProductSize', 'ProductController@storeProductSize')->name('storeProductSize');
    Route::post('/updateProductSize', 'ProductController@updateProductSize')->name('updateProductSize');
    Route::post('/deleteProductSize', 'ProductController@deleteProductSize')->name('deleteProductSize');
//category
Route::resource('category', 'CategoryController');


});
