<?php

use App\Http\Controllers\SportsmanController;
use App\Http\Controllers\CompetitionController;
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

    Route::get('/sportsmen', [SportsmanController::class, 'index'])->name('sportsmen');
    Route::get('/sportsmen/create', [SportsmanController::class, 'create'])->name('showStoreSportsmen');
    Route::post('/sportsmen/create', [SportsmanController::class, 'store'])->name('storeSportsmen');
    Route::post('/sportsmen/{sportsman}', [SportsmanController::class, 'destroy'])->name('destroySportsmen');
    Route::get('/sportsmen/update/{sportsman}', [SportsmanController::class, 'update'])->name('showUpdateSportsmen');
    Route::post('/sportsmen/update/{sportsman}', [SportsmanController::class, 'patch'])->name('updateSportsmen');

    Route::get('/competitions', [CompetitionController::class, 'index'])->name('competitions');
    Route::get('/competitions/create', [CompetitionController::class, 'create'])->name('showStoreCompetition');
    Route::post('/competitions/create', [CompetitionController::class, 'store'])->name('storeCompetition');
    Route::get('/competitions/{competition}', [CompetitionController::class, 'show'])->name('singleCompetition');
    Route::post('/competitions/{competition}', [CompetitionController::class, 'destroy'])->name('destroyCompetition');
    Route::get('/competitions/update/{competition}', [CompetitionController::class, 'update'])->name('showUpdateCompetition');
    Route::post('/competitions/update/{competition}', [CompetitionController::class, 'patch'])->name('updateCompetition');

});

