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
Route::get('/contact', 'indexController@contact');
Route::get('/tableRonde', 'indexController@tableRonde');

Auth::routes();

Route::get('/tdb', 'HomeController@index')->name('tdb');
Route::get('/commander', 'commandeController@index');

Route::resource('article', 'articleController');
