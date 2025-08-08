<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\WeatherWarningController;
use App\Http\Controllers\MarineController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Homepage route (default Arran center)
Route::get('/', [WeatherController::class, 'index'])->name('dashboards.index');

// Dynamic location route
 Route::get('/forecast/{slug}/{layout?}', [WeatherController::class, 'indexBySlug'])->name('forecast.slug.layout');
Route::get('/forecast/{slug}', [WeatherController::class, 'indexBySlug'])->name('forecast');

Route::get('/marine-forecast', [MarineController::class, 'index'])->name('marine.forecast');
Route::get('/marine-forecast/{slug}', [MarineController::class, 'indexBySlug'])->name('marine.forecast.slug');

Route::prefix('resources')->name('resources.')->group(function () {
    Route::get('/flight-radar', [ResourcesController::class, 'flightRadar'])->name('flight-radar');
    Route::get('/ship-ais', [ResourcesController::class, 'shipAis'])->name('ship-ais');
    Route::get('/aurora', [ResourcesController::class, 'aurora'])->name('aurora');
    Route::get('/ship-caledonian-isles', [ResourcesController::class, 'shipCaledonianIsles'])->name('ship-caledonian-isles');
    Route::get('/ship-catriona', [ResourcesController::class, 'shipCatriona'])->name('ship-catriona');
    Route::get('/ship-glen-sannox', [ResourcesController::class, 'shipGlenSannox'])->name('ship-glen-sannox');
    Route::get('/ship-alfred', [ResourcesController::class, 'shipAlfred'])->name('ship-alfred');
    Route::get('/lightning', [ResourcesController::class, 'lightning'])->name('lightning');
    Route::get('/earthquakes', [ResourcesController::class, 'earthquakes'])->name('earthquakes');
    Route::get('/webcams', [ResourcesController::class, 'webcams'])->name('webcams');
    Route::get('/tides/{location}', [ResourcesController::class, 'tides'])->name('tides');
   
});

Route::get('/weather/warnings', [WeatherWarningController::class, 'index'])->name('weather.warnings');
Route::get('/weather/emergency', [WeatherWarningController::class, 'emergency'])->name('weather.emergency');

// Catch-all routes (must be last)
Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
Route::get('{any}', [RoutingController::class, 'root'])->name('any');
