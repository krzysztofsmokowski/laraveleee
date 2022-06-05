<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->middleware('auth');
Route::get('/produkts', [App\Http\Controllers\ProduktController::class, 'index']) ->name('produkts.index')->middleware('auth');
Route::delete('/users/{id}',[App\Http\Controllers\UsersController::class, 'destroy'])->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
