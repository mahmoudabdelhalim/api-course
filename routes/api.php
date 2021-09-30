<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});



Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');

Route::post('password/email', 'Api\AuthController@forgot');
Route::post('password/reset', 'Api\AuthController@reset');

Route::post('send-sms', 'Api\AuthController@sendSmsNotificaition');

Route::get('products', 'Api\ProductController@index');
Route::get('categories', 'Api\ProductController@categories');
Route::get('subCategories/{id}', 'Api\ProductController@subCategories');
Route::get('latest-product', 'Api\ProductController@latest');
Route::post('search', 'Api\ProductController@search');
Route::get('show-product/{id}', 'Api\ProductController@single_product');
//must login brfore
  Route::middleware('auth:api')->group(function () {

    Route::post('logout', 'Api\AuthController@logout');
    //
    Route::post('add-to-cart', 'Api\CartController@storeCart');

     Route::get('cart', 'Api\CartController@cart');
     Route::get('add-qty/{id}', 'Api\CartController@AddQuantity');
     Route::get('sub-qty/{id}', 'Api\CartController@SubstractQuantity');
     Route::post('checkout', 'Api\CartController@checkout');
     Route::post('place-order', 'Api\CartController@order');
     Route::get('order', 'Api\CartController@order');
    });
