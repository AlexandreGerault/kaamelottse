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

use App\Http\Controllers\FrontOffice\HomeController;
use App\Http\Controllers\FrontOffice\IndexController;
use App\Http\Controllers\FrontOffice\MessagesController;
use App\Http\Controllers\FrontOffice\OrderController;
use App\Http\Controllers\FrontOffice\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/index', [IndexController::class, 'index'])->name('home');
Route::get('/contact', [IndexController::class, 'get_contact']);
Route::post('/contact', [IndexController::class, 'post_contact']);
Route::get('/tableRonde', [IndexController::class, 'tableRonde'])->name('round-table');

Route::get('/tableau-de-bord', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');

Route::resource('order', OrderController::class);
Route::post('order/{order}/sendMessage', [OrderController::class, 'sendMessage'])->name('frontoffice.order.message');
Route::resource('message', MessagesController::class);
Route::resource('produits', ProductController::class);
