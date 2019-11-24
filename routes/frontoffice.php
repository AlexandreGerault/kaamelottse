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

Route::get('/tableau-de-bord', 'HomeController@index')->name('dashboard')->middleware('auth');

Route::resource('order', 'OrderController');
Route::resource('article', 'ArticleController');
Route::resource('message', 'MessagesController');
Route::resource('produits', 'ProductController');
