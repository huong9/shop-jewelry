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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/product/{id}', 'Api\ProductController@getOne')->name('getOne');
Route::get('/productDt/{id}', 'Api\ProductController@getOneDt')->name('getOneDt');
Route::get('/color/{id}', 'Api\ProductController@getColor');
Route::get('/size/{id}', 'Api\ProductController@getSize');
Route::get('/highestPrice', 'Api\ProductController@getProd');
Route::post('/api-wishlist-add', 'Api\WishlistApiController@add_wishlist')->name('add_wishlist');
Route::get('/wishlist-del/{id}', 'Api\WishlistApiController@wishlist_delete')->name('wishlist.delete');
