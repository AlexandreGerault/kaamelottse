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
use App\Http\Controllers\BackOffice\ArticleController;
use App\Http\Controllers\BackOffice\DeliveryController;
use App\Http\Controllers\BackOffice\IndexController;
use App\Http\Controllers\BackOffice\MessagesController;
use App\Http\Controllers\BackOffice\OrderController;
use App\Http\Controllers\BackOffice\ProductController;
use App\Http\Controllers\BackOffice\QuoteController;
use App\Http\Controllers\BackOffice\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('username_autocomplete', [OrderController::class, 'usernameAutocomplete'])
    ->name('order.username_autocomplete');

Route::get('product/resume', [ProductController::class, 'resume'])->name('product.resume');

Route::resource('order', OrderController::class);
Route::resource('article', ArticleController::class);
Route::resource('message', MessagesController::class);
Route::resource('product', ProductController::class);
Route::resource('quote', QuoteController::class);
Route::resource('user', UserController::class);


//Delivery
Route::get('/deliver', [DeliveryController::class, 'index'])->name('deliver.index');
Route::get('/deliver/{order}', [DeliveryController::class, 'delivery'])->name('deliver.delivery');
Route::get('/deliver/{order}/takeCharge', [DeliveryController::class, 'takeCharge'])->name('deliver.takeCharge');
Route::get('/deliver/{order}/cancel', [DeliveryController::class, 'cancel'])->name('deliver.cancel');
Route::post('/deliver/{order}/sendMessage', [DeliveryController::class, 'sendMessage'])->name('deliver.message');
Route::post('/deliver/{order}/endDelivery', [DeliveryController::class, 'endDelivery'])->name('deliver.endDelivery');


Route::get('message/respond/{message}', [MessagesController::class, 'respond'])->name('message.respond');
Route::post('message/respond/{message}', [MessagesController::class, 'postRespond'])->name('message.respond');

/*
* User Routes
*/
Route::post('user/{user}/roles/attach', [UserController::class, 'attachRoles'])->name('user.roles.attach');
Route::post('user/{user}/roles/detach', [UserController::class, 'detachRoles'])->name('user.roles.detach');


