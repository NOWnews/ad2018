<?php

Route::get('/ad/{inventoryId}', 'AdController@getAd');
Route::get('/ads/{inventoryId}', 'AdController@getAds');
