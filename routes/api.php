<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/locations', function () {
    return App\Models\Locations::all();
});

Route::get('/weather', [WeatherController::class, 'getWeather']);