<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

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
Route::get('/forecast/{slug}', [WeatherController::class, 'indexBySlug'])->name('forecast');

// Catch-all routes (must be last)
Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
Route::get('{any}', [RoutingController::class, 'root'])->name('any');
