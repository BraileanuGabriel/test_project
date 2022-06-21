<?php

use App\Http\Controllers\PassengerController;
use App\Http\Controllers\RouteController;
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
    return redirect()->route('home');
});

Route::group(['prefix' => 'home'], function () {
    Route::get('/', '\App\Http\Controllers\HomeController@index')->name('home');

    Route::get('/routes', [RouteController::class, 'index'])->name('routes');
    Route::get('/routes/create', [RouteController::class, 'create'])->name('showStoreRoute');
    Route::post('/routes/create', [RouteController::class, 'store'])->name('storeRoute');
    Route::post('/routes/{id}', [RouteController::class, 'destroy'])->name('destroyRoute');
    Route::get('/routes/update/{id}', [RouteController::class, 'update'])->name('showUpdateRoute');
    Route::post('/routes/update/{id}', [RouteController::class, 'patch'])->name('updateRoute');

    Route::get('/passengers', [PassengerController::class, 'index'])->name('passengers');
    Route::get('/passengers/create', [PassengerController::class, 'create'])->name('showStorePassenger');
    Route::post('/passengers/create', [PassengerController::class, 'store'])->name('storePassenger');
    Route::post('/passengers/{id}', [PassengerController::class, 'destroy'])->name('destroyPassenger');
    Route::get('/passengers/{id}', [PassengerController::class, 'show'])->name('singlePassenger');
    Route::get('/passengers/update/{id}', [PassengerController::class, 'update'])->name('showUpdatePassenger');
    Route::post('/passengers/update/{id}', [PassengerController::class, 'patch'])->name('updatePassenger');
});

