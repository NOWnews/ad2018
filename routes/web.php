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
Route::get('/home', 'HomeController@index')->middleware('check.ip')->name('home');
Route::get('/order', 'OrderController@list')->middleware('check.ip');
Route::get('/order/create', 'OrderController@createView')->middleware('check.ip')->name('order.create.form');
Route::post('/order/create', 'OrderController@createOrder')->middleware('check.ip')->name('order.create.post');
Route::get('/order/{id}', 'OrderController@orderDetail')->middleware('check.ip')->name('order.detail');
Route::get('/order/{id}/edit', 'OrderController@editView')->middleware('check.ip')->name('order.edit.form');
Route::post('/order/{id}', 'OrderController@updateOrder')->middleware('check.ip')->name('order.edit.post');
Route::get('/order/search/name/', 'OrderController@searchOrder')->middleware('check.ip');
Route::get('/inventory', 'InventoryController@list')->middleware('check.ip');
Route::get('/inventory/create', 'InventoryController@createView')->middleware('check.ip')->name('inventory.create.form');
Route::post('/inventory/create', 'InventoryController@createInventory')->middleware('check.ip')->name('inventory.create.post');
Route::get('/inventory/{id}', 'InventoryController@inventoryDetail')->middleware('check.ip')->name('inventory.detail');
Route::get('inventory/{id}/edit', 'InventoryController@editView')->middleware('check.ip')->name('inventory.edit.form');
Route::post('inventory/', 'InventoryController@updateInventory')->middleware('check.ip')->name('inventory.edit.post');
Route::get('/creative', 'CreativeController@list')->middleware('check.ip');
Route::get('/creative/create/{order_id}', 'CreativeController@createView')->middleware('check.ip')->name('creative.create.form');
Route::post('/creative/create', 'CreativeController@createCreative')->middleware('check.ip')->name('creative.create.post');
Route::get('/creative/{id}', 'CreativeController@creativeDetail')->middleware('check.ip')->name('creative.detail');
Route::get('creative/{id}/status/{status}', 'CreativeController@updateStatus')->middleware('check.ip')->name('creative.status.update');
Route::get('creative/{id}/edit', 'CreativeController@editView')->middleware('check.ip')->name('creative.edit.form');
Route::post('creative/{id}', 'CreativeController@updateCreative')->middleware('check.ip')->name('creative.edit.post');
Route::post('/queue/create/', 'QueueController@createQueue')->middleware('check.ip')->name('queue.create.post');
Route::get('/queue/delete/{id}', 'QueueController@deleteQueue')->middleware('check.ip');
// public api
Route::get('/ad/{inventoryId}', 'AdController@getAd');
