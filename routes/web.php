<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduktController;
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
Route::get('/produkts', [App\Http\Controllers\ProduktController::class, 'index']) ->name('produkts.index')->middleware('can:Administrators');
Route::get('/produkts/create', [App\Http\Controllers\ProduktController::class, 'create']) ->name('produkts.create')->middleware('can:Users');
Route::post('/produkts', [App\Http\Controllers\ProduktController::class, 'store']) ->name('produkts.store')->middleware('auth');
Route::get('/produkts/{produkt}', [App\Http\Controllers\ProduktController::class, 'edit']) ->name('produkts.edit')->middleware('auth');
Route::post('/produkts/{produkt}', [\App\Http\Controllers\ProduktController::class, 'update']) -> name('produkts.update') -> middleware('auth');
Route::delete('/produkts/{produkt}',[App\Http\Controllers\ProduktController::class, 'destroy']) -> name('produkts.destroy')->middleware('auth');
Route::delete('/users/{id}',[App\Http\Controllers\UsersController::class, 'destroy'])->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
