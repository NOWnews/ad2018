<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/order', 'OrderController@index');
Route::get('/order/create', 'OrderController@createView')->name('order.create.form');
Route::post('/order/create', 'OrderController@createOrder')->name('order.create.post');
Route::get('/order/{id}', 'OrderController@orderDetail')->name('order.detail');