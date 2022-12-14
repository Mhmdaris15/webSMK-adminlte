<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BidangStudiController;
use App\Http\Controllers\StandarKompetensiController;


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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/whatever', function () {
    return view('whatever');
})->name('whatever');

Route::resource('users', UserController::class)->middleware('auth');

Route::resource('bidstudi', BidangStudiController::class)->middleware('auth');

Route::resource('standkomp', StandarKompetensiController::class)->middleware('auth');
