<?php

Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/getNewOrders', "MainSettingsController@getNewOrders");
Route::post('/promo/{id?}', "MainSettingsController@promo")->where('id', '^(?!(admin|login)(\/|$))[A-Za-z0-9+-_\/]+');
Route::get('/feed', "FeedController@index");
Route::get('/warehouse', "WarehouseController@index")->name('warehouse');
Route::get('/warehouse/{id?}', "WarehouseController@edit")->name('warehouse.edit');
Route::middleware(\App\Http\Middleware\WarehouseRouteMiddleware::class)->get('/{id?}', "MainSettingsController@index")
    ->where('id', '^(?!(admin|login)(\/|$))[A-Za-z0-9+-_\/]+')->name('main');
Route::post('/mail', "MainSettingsController@post");

Auth::routes();
