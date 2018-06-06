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
Route::get('/order', 'OrderController@list');
Route::get('/order/create', 'OrderController@createView')->name('order.create.form');
Route::post('/order/create', 'OrderController@createOrder')->name('order.create.post');
Route::get('/order/{id}', 'OrderController@orderDetail')->name('order.detail');
Route::get('/inventory', 'InventoryController@list');
Route::get('/inventory/create', 'InventoryController@createView')->name('inventory.create.form');
Route::post('/inventory/create', 'InventoryController@createInventory')->name('inventory.create.post');
Route::get('/creative', 'CreativeController@list');
Route::get('/creative/create/{order_id}', 'CreativeController@createView')->name('creative.create.form');
Route::post('/creative/create', 'CreativeController@createCreative')->name('creative.create.post');
Route::get('/creative/{id}', 'CreativeController@creativeDetail')->name('creative.detail');
