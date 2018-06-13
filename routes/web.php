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
// internal use
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/order', 'OrderController@list');
Route::get('/order/create', 'OrderController@createView')->name('order.create.form');
Route::post('/order/create', 'OrderController@createOrder')->name('order.create.post');
Route::get('/order/{id}', 'OrderController@orderDetail')->name('order.detail');
Route::get('/order/{id}/edit', 'OrderController@editView')->name('order.edit.form');
Route::post('/order/{id}', 'OrderController@updateOrder')->name('order.edit.post');
Route::get('/inventory', 'InventoryController@list');
Route::get('/inventory/create', 'InventoryController@createView')->name('inventory.create.form');
Route::post('/inventory/create', 'InventoryController@createInventory')->name('inventory.create.post');
Route::get('/inventory/{id}', 'InventoryController@inventoryDetail')->name('inventory.detail');
Route::get('inventory/{id}/edit', 'InventoryController@editView')->name('inventory.edit.form');
Route::post('inventory/', 'InventoryController@updateInventory')->name('inventory.edit.post');
Route::get('/creative', 'CreativeController@list');
Route::get('/creative/create/{order_id}', 'CreativeController@createView')->name('creative.create.form');
Route::post('/creative/create', 'CreativeController@createCreative')->name('creative.create.post');
Route::get('/creative/{id}', 'CreativeController@creativeDetail')->name('creative.detail');
Route::get('creative/{id}/status/{status}', 'CreativeController@updateStatus')->name('creative.status.update');
Route::get('creative/{id}/edit', 'CreativeController@editView')->name('creative.edit.form');
Route::post('creative/{id}', 'CreativeController@updateCreative')->name('creative.edit.post');
Route::post('/queue/create/', 'QueueController@createQueue')->name('queue.create.post');
Route::get('/queue/delete/{id}', 'QueueController@deleteQueue');
// public api
Route::get('/ad/{inventoryId}', 'AdController@getAd')->name('home');
