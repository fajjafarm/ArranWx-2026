<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
|
*/

Route::get('/locations', function () {
    return App\Models\Location::all();
});

Route::get('/weather', [WeatherController::class, 'getWeather']);