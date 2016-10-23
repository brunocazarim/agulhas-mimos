<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function(){
    return view('index');
});

Route::get('/products', 'ProductsController@listAllProducts');

Route::get('/products/edit/{id}', 'ProductsController@getProduct')->where('id', '[0-9]+');

Route::post('/products/edit/provide', 'ProductsController@createOrUpdateProduct');

Route::get('/products/delete', 'ProductsController@deleteProduct');
Auth::routes();

Route::get('/home', 'HomeController@index');
