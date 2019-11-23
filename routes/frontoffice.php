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

Route::get('/', 'IndexController@index');
Route::get('/index', 'IndexController@index')->name('home');
Route::get('/contact', 'IndexController@get_contact');
Route::post('/contact', 'IndexController@post_contact');
Route::get('/tableRonde', 'IndexController@tableRonde')->name('round-table');
Route::get('/banquet', function () {
    return redirect()->route('product.index');
});

Route::get('/tableau-de-bord', 'HomeController@index')->name('dashboard');

//Delivery
Route::get('/deliver', 'DeliveryController@index');
Route::get('/deliver/{id}', 'DeliveryController@delivery')->name('deliver.delivery');
Route::get('/deliver/{id}/takeCharge', 'DeliveryController@takeCharge')->name('deliver.takeCharge');
Route::get('/deliver/{id}/cancel', 'DeliveryController@cancel')->name('deliver.cancel');
Route::post('/deliver/{id}/sendMessage', 'DeliveryController@sendMessage')->name('deliver.message');
Route::post('/deliver/{id}/endDelivery', 'DeliveryController@endDelivery')->name('deliver.endDelivery');

Route::resource('order', 'OrderController');
Route::get('order/confirm/{order}', 'OrderController@confirm')->name('order.confirm');
Route::resource('article', 'ArticleController');
Route::resource('message', 'MessagesController');
Route::resource('product', 'ProductController');
