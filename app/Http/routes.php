<?php

Route::group(['prefix' => 'api/v1', 'middleware' => 'cors'], function() {

    Route::group(['middleware' => 'kiosk'], function() {

        Route::post('check', 'CheckController@check');

        Route::post('products', 'ProductsController@index');

        Route::post('orders/create', 'OrdersController@store');

        Route::post('user', 'ParticipantsController@show');

        Route::post('stations', 'StationsController@index');

        Route::post('orders/{id}/done', 'OrdersController@update');

        Route::post('orders/open', 'OrdersController@openOrders');

        Route::post('orders/finished', 'OrdersController@finishedOrders');

        Route::post('categories/{id}/visible', 'CategoriesController@update');

        Route::post('products/{id}/visible', 'CategoriesController@update');
    });
});
