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

//Dashboard Admin
Route::get('/', 'IndexController@index')->name('index');

Route::get('username_autocomplete', 'OrderController@usernameAutocomplete')
    ->name('order.username_autocomplete');

Route::resource('order', 'OrderController');
Route::resource('article', 'ArticleController');
Route::resource('message', 'MessagesController');
Route::resource('product', 'ProductController');
Route::resource('quote', 'QuoteController');
Route::resource('user', 'UserController');

//Delivery
Route::get('/deliver', 'DeliveryController@index')->name('deliver.index');
Route::get('/deliver/{order}', 'DeliveryController@delivery')->name('deliver.delivery');
Route::get('/deliver/{order}/takeCharge', 'DeliveryController@takeCharge')->name('deliver.takeCharge');
Route::get('/deliver/{order}/cancel', 'DeliveryController@cancel')->name('deliver.cancel');
Route::post('/deliver/{order}/sendMessage', 'DeliveryController@sendMessage')->name('deliver.message');
Route::post('/deliver/{order}/endDelivery', 'DeliveryController@endDelivery')->name('deliver.endDelivery');


Route::get('message/respond/{message}', 'MessagesController@respond')->name('message.respond');
Route::post('message/respond/{message}', 'MessagesController@postRespond')->name('message.respond');

/*
* User Routes
*/
Route::post('user/{user}/roles/attach', 'UserController@attachRoles')->name('user.roles.attach');
Route::post('user/{user}/roles/detach', 'UserController@detachRoles')->name('user.roles.detach');
