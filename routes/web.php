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

Auth::routes(['verify' => true]);

Route::get('/laravel', function () {
    return view('welcome');
});


Route::get('/', 'IndexController@index');
Route::get('/index', 'IndexController@index');
Route::get('/contact', 'IndexController@get_contact');
Route::post('/contact', 'IndexController@post_contact');
Route::get('/tableRonde', 'IndexController@tableRonde');
Route::get('/banquet', 'ProductController@index');

Auth::routes();

Route::get('/tableau-de-bord', 'HomeController@index')->name('dashboard');
Route::get('message/respond/{message}', 'MessagesController@respond')->name('message.respond');
Route::post('message/respond/{message}', 'MessagesController@postRespond')->name('message.respond');

//Delivery
Route::get('/deliver', 'DeliveryController@index');
Route::get('/deliver/{id}', 'DeliveryController@delivery')->name('deliver.delivery');
Route::get('/deliver/{id}/takeCharge', 'DeliveryController@takeCharge')->name('deliver.takeCharge');
Route::get('/deliver/{id}/cancel', 'DeliveryController@cancel')->name('deliver.cancel');
Route::post('/deliver/{id}/sendMessage', 'DeliveryController@sendMessage')->name('deliver.message');
Route::post('/deliver/{id}/endDelivery', 'DeliveryController@endDelivery')->name('deliver.endDelivery');

Route::resource('order', 'OrderController');

Route::get('username_autocomplete', 'OrderController@usernameAutocomplete')
    ->name('order.username_autocomplete');
Route::resource('article', 'ArticleController');
Route::resource('message', 'MessagesController');
Route::resource('citation', 'CitationsController');
Route::resource('product', 'ProductController');