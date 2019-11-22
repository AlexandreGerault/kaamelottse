<?php

/*
|--------------------------------------------------------------------------
| BackOffice Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('username_autocomplete', 'OrderController@usernameAutocomplete')
    ->name('order.username_autocomplete');

Route::resource('order', 'OrderController');
Route::resource('article', 'ArticleController');
Route::resource('message', 'MessagesController');
Route::resource('product', 'ProductController');

Route::get('message/respond/{message}', 'MessagesController@respond')->name('message.respond');
Route::post('message/respond/{message}', 'MessagesController@postRespond')->name('message.respond');