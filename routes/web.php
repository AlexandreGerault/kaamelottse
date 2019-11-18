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

Route::get('/laravel', function () {
    return view('welcome');
});


Route::get('/', 'IndexController@index');
Route::get('/index', 'IndexController@index');
Route::get('/contact', 'IndexController@get_contact');
Route::post('/contact', 'IndexController@post_contact');
Route::get('/tableRonde', 'IndexController@tableRonde');
Route::get('/banquet', 'CommandeController@index');

Auth::routes();

Route::get('/tableau-de-bord', 'HomeController@index')->name('dashboard');
Route::get('/commander', 'CommandeController@index');

Route::resource('article', 'ArticleController');
Route::resource('message', 'MessagesController');
Route::get('message/respond/{message}', 'MessagesController@respond')->name('message.respond');
Route::post('message/respond/{message}', 'MessagesController@postRespond')->name('message.respond');
Route::resource('citation', 'CitationsController');
Route::resource('product', 'ProductController');