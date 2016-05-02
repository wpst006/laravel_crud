<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Product Listing Display
Route::get('product/index', 'ProductController@index');
// Product Create/Update Form Display
Route::get('product/setup/{productID?}', 'ProductController@setup');
// Product Create/Update POST Operation
Route::post('product/save', 'ProductController@save');
// Product Delete
Route::delete('/product/delete/{productID}',
    'ProductController@delete');