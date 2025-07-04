<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\RoutingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', [WeatherController::class, 'index'])->name('dashboard');
Route::get('/home', fn () => view('dashboards.index'))->name('home');
Route::get('/warnings', [WeatherController::class, 'warnings'])->name('dashboard.warnings');
Route::get('/location/{name}', [WeatherController::class, 'show'])->name('location.show');
Route::get('/marine/{name}', [WeatherController::class, 'show'])->name('marine.show');

Route::prefix('resources')->name('resources.')->group(function () {
    Route::get('/earthquakes-near-arran', [ResourcesController::class, 'earthquakes'])->name('earthquakes');
    Route::get('/ships-near-arran', [ResourcesController::class, 'shipAis'])->name('ship-ais');
    Route::get('/ship-mv-caledonian-isles', [ResourcesController::class, 'shipCaledonianIsles'])->name('ship-caledonian-isles');
    Route::get('/ship-mv-catriona', [ResourcesController::class, 'shipCatriona'])->name('ship-catriona');
    Route::get('/ship-mv-glen-sannox', [ResourcesController::class, 'shipGlenSannox'])->name('ship-glen-sannox');
    Route::get('/ship-mv-alfred', [ResourcesController::class, 'shipAlfred'])->name('ship-alfred');
    Route::get('/planes-over-arran', [ResourcesController::class, 'flightRadar'])->name('flight-radar');
    Route::get('/lightning-near-arran', [ResourcesController::class, 'lightning'])->name('lightning');
    Route::get('/tide', [WeatherController::class, 'tide'])->name('tide.show');
    Route::get('/arran-webcams', [ResourcesController::class, 'webcams'])->name('webcams');
    Route::get('/aurora-borealis-northern-lights', [ResourcesController::class, 'aurora'])->name('aurora');
});

// Catch-all routes (must be last)
Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
Route::get('{any}', [RoutingController::class, 'root'])->name('any');

        