<?php

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the  api routes for this application.
| These routes are prefixed with the api/v1 prefix, so put new routes in
| this route group. The kiosk middleware is for kiosk purposes only.
|
*/
Route::group(['prefix' => 'api/v1', 'middleware' => 'cors'], function() {
    Route::group(['middleware' => 'kiosk'], function() {

        Route::post('check', function() {
            return response()->json(['success' => true], 200);
        });

        Route::post('products', 'ProductsController@index');

        Route::post('orders/create', 'OrdersController@store');

        /**
         * Kassas
         */
        Route::group([], function() {
            //products = array van producten
            //id, amount, sub


            //barcode
            Route::post('user', 'UsersController@show');
            Route::post('stations', 'StationsController@index');
        });

        /**
         * Kitchen
         */
        Route::group([], function() {
            //variabele done (1, 0) 1 klaar, 0 (date-finished word 0)
            Route::post('orders/{id}/done', 'OrdersController@update');

            //get open orders
            Route::post('orders/open', 'OrdersController@update');

            //8 laatste orders die finished zijn
            Route::post('orders/finished', 'OrdersController@update');

            //lijst van stations
            Route::post('stations', 'StationsController@index');

            //variabele: visible (0,1)
            Route::post('categories/{id}/visible', 'CategoriesController@update');

            //zie hierboven
            Route::post('products/{id}/visible', 'CategoriesController@update');
        });

    });
});
