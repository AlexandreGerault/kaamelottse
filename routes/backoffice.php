<?php

/*
|--------------------------------------------------------------------------
| BackOffice Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application backoffice.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" & "auth" middleware group.
|
*/

Route::get('username_autocomplete', 'OrderController@usernameAutocomplete')
    ->name('order.username_autocomplete');

Route::resource('order', 'OrderController');
Route::resource('article', 'ArticleController');
Route::resource('message', 'MessagesController');
Route::resource('product', 'ProductController');
Route::resource('quote', 'QuoteController');

Route::get('message/respond/{message}', 'MessagesController@respond')->name('message.respond');
Route::post('message/respond/{message}', 'MessagesController@postRespond')->name('message.respond');