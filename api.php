<?php

use Illuminate\Http\Request;

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
Route::post('/customers', 'CustomersController@store');
Route::get('/customers', 'CustomersController@show');

Route::post('/product', 'ProductController@store');
Route::get('/product', 'ProductController@show');

Route::post('/orders', 'OrdersController@store');
Route::get('/orders', 'OrdersController@show');
Route::get('/orders/{id_orders}', 'OrdersController@detail');

Route::post('/petugas', 'PetugasController@store');
Route::get('/petugas', 'PetugasController@show');

Route::post('/detail_orders', 'Detail_OrdersController@store');
Route::get('/detail_orders', 'Detail_OrdersController@show');
Route::get('/detail_orders/{id_product}', 'Detail_OrdersController@detail');

