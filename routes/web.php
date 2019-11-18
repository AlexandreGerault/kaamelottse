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

Route::get('/laravel', function () {
    return view('welcome');
});


Route::get('/', 'indexController@index');
Route::get('/index', 'indexController@index');
Route::get('/banquet', 'commandeController@index');
Route::get('/contact', 'indexController@get_contact');
Route::post('/contact', 'indexController@post_contact');
Route::get('/tableRonde', 'indexController@tableRonde');

Auth::routes();

Route::get('/tdb', 'HomeController@index')->name('tdb');
Route::get('/commander', 'commandeController@index');

Route::resource('article', 'articleController')->middleware('checkRole:1');
Route::resource('message', 'messagesController')->middleware('checkRole:1');
Route::resource('citation', 'citationsController')->middleware('checkRole:1');
Route::resource('produit', 'produitController')->middleware('checkRole:1');
