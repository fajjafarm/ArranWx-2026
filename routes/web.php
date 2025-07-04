<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;


// Homepage route to render index.blade.php
Route::get('/', [WeatherController::class, 'index'])->name('index');

Route::get('/locations', function () {
    return App\Models\Location::all();
});

Route::get('/weather', [WeatherController::class, 'getWeather']);