<?php
Route::resource('categories', 'CategoryController');

Route::group(['prefix' => 'api/v1', 'middleware' => 'cors'], function() {

    Route::group(['middleware' => []], function() {

        Route::post('check', 'Services\CheckController@check');

        Route::post('products', 'Services\ProductsController@index');

        Route::post('orders/create', 'Services\OrdersController@store');

        Route::post('user', 'Services\ParticipantsController@show');

        Route::post('stations', 'Services\StationsController@index');

        Route::post('orders/{id}/done', 'Services\OrdersController@update');

        Route::post('orders/open', 'Services\OrdersController@openOrders');

        Route::post('orders/finished', 'Services\OrdersController@finishedOrders');

        Route::post('categories/{id}/visible', 'Services\CategoriesController@update');

        Route::post('products/{id}/visible', 'Services\CategoriesController@update');
    });
});
