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
    Route::post('/routes/{route}', [RouteController::class, 'destroy'])->name('destroyRoute');
    Route::get('/routes/{route}', [RouteController::class, 'show'])->name('singleRoute');
    Route::get('/routes/update/{route}', [RouteController::class, 'update'])->name('showUpdateRoute');
    Route::post('/routes/update/{route}', [RouteController::class, 'patch'])->name('updateRoute');

    Route::get('/passengers', [PassengerController::class, 'index'])->name('passengers');
    Route::get('/passengers/create', [PassengerController::class, 'create'])->name('showStorePassenger');
    Route::post('/passengers/create', [PassengerController::class, 'store'])->name('storePassenger');
    Route::post('/passengers/{passenger}', [PassengerController::class, 'destroy'])->name('destroyPassenger');
    Route::get('/passengers/{passenger}', [PassengerController::class, 'show'])->name('singlePassenger');
    Route::get('/passengers/update/{passenger}', [PassengerController::class, 'update'])->name('showUpdatePassenger');
    Route::post('/passengers/update/{passenger}', [PassengerController::class, 'patch'])->name('updatePassenger');

    Route::post('/routes/add/{route}', [RouteController::class, 'addToRoute'])->name('addUserToRoute');
    Route::post('/routes/delete/{route}', [RouteController::class, 'deleteFromRoute'])->name('deleteUserFromRoute');
    Route::post('/passengers/add/{passenger}', [PassengerController::class, 'addToUser'])->name('addRouteToUser');
    Route::post('/passengers/delete/{passenger}', [PassengerController::class, 'deleteFromUser'])->name('deleteRouteFromUser');

});

