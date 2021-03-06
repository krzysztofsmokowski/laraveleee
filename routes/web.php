<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);
Route::get('/produkts', [App\Http\Controllers\ProduktController::class, 'index']) ->name('produkts.index')->middleware('auth');
Route::get('/cart/list', [App\Http\Controllers\CartController::class, 'index']) ->name('cart.index')->middleware('auth');
Route::post('/cart/{produkt}', [App\Http\Controllers\CartController::class, 'store']) ->name('cart.store')->middleware('auth');
Route::get('/produkts/create', [App\Http\Controllers\ProduktController::class, 'create']) ->name('produkts.create')->middleware('can:Administrator');
Route::post('/produkts', [App\Http\Controllers\ProduktController::class, 'store']) ->name('produkts.store')->middleware('can:Administrator');
Route::post('/produkts/{produkt}', [App\Http\Controllers\ProduktController::class, 'update']) -> name('produkts.update') -> middleware('can:Administrator');
//Route::get('/produkts/{produkt}', [App\Http\Controllers\ProduktController::class, 'show']) ->name('produkts.show')->middleware('auth');
Route::get('/produkts/{produkt}', [App\Http\Controllers\ProduktController::class, 'edit']) ->name('produkts.edit')->middleware('auth');
Route::delete('/produkts/{produkt}',[App\Http\Controllers\ProduktController::class, 'destroy']) -> name('produkts.destroy')->middleware('can:Administrator');
Route::delete('/cart/{produkt}',[App\Http\Controllers\CartController::class, 'destroy']) -> name('cart.destroy')->middleware('can:Administrator');
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index')->middleware('can:Administrator');
Route::get('/users/create', [App\Http\Controllers\UsersController::class, 'create']) ->name('users.create')->middleware('can:Administrator');
Route::post('/users', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store')->middleware('can:Administrator');
Route::get('/users/{user}', [App\Http\Controllers\UsersController::class, 'edit']) ->name('users.edit')->middleware('can:Administrator');
Route::get('/adresedit/{user}', [App\Http\Controllers\UsersController::class, 'adresedit']) ->name('adresedit.edit')->middleware('can:Administrator');
Route::post('/adresedit/{user}', [App\Http\Controllers\UsersController::class, 'adresupdate']) -> name('adresupdate.update') -> middleware('can:Administrator');
Route::post('/users/{user}', [App\Http\Controllers\UsersController::class, 'update']) -> name('users.update') -> middleware('can:Administrator');
Route::delete('/users/{id}',[App\Http\Controllers\UsersController::class, 'destroy'])->middleware('can:Moderator');
Route::get('zamowienia',[App\Http\Controllers\ZamowieniaController::class, 'index'])->name('zamowienia.index')->middleware('auth');
Route::post('zamowienia',[App\Http\Controllers\ZamowieniaController::class, 'store'])->name('zamowienia.store')->middleware('auth');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
