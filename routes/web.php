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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'market', 'middleware' => 'auth'], function (){
    Route::get('s/{id_market}', 'MarketsController@show')->name('market');

    Route::get('create', 'MarketsController@create')->name('market_form');
    Route::post('store', 'MarketsController@store')->name('market_store');

    Route::get('edit/{id_market}', 'MarketsController@edit')->name('market_edit');
    Route::post('update', 'MarketsController@update')->name('market_update');
});

Route::group(['prefix' => 'product', 'middleware' => 'auth'], function (){
    Route::get('/', 'ProductsController@index')->name('products');

    Route::view('/create', 'site.forms.productFormCreate')->name('product_form');
    Route::post('store', 'ProductsController@store')->name('product_store');
});