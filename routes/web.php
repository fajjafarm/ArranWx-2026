<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/locations', function () {
    return App\Models\Location::all();
});

Route::get('/weather', [WeatherController::class, 'getWeather']);