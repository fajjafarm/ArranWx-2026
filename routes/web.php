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

// Location-specific routes
Route::get('/blackwaterfoot', fn() => WeatherController::indexWithParams(55.5020, -5.3320, 'Blackwaterfoot Weather'))->name('location.blackwaterfoot');
Route::get('/brodick', fn() => WeatherController::indexWithParams(55.5765, -5.1497, 'Brodick Weather'))->name('location.brodick');
Route::get('/catacol', fn() => WeatherController::indexWithParams(55.6940, -5.3260, 'Catacol Weather'))->name('location.catacol');
Route::get('/corrie', fn() => WeatherController::indexWithParams(55.6435, -5.1415, 'Corrie Weather'))->name('location.corrie');
Route::get('/dougarie', fn() => WeatherController::indexWithParams(55.6800, -5.3600, 'Dougarie Weather'))->name('location.dougarie');
Route::get('/kildonnan', fn() => WeatherController::indexWithParams(55.5100, -5.1000, 'Kildonnan Weather'))->name('location.kildonnan');
Route::get('/kilmory', fn() => WeatherController::indexWithParams(55.4470, -5.2280, 'Kilmory Weather'))->name('location.kilmory');
Route::get('/lagg', fn() => WeatherController::indexWithParams(55.4600, -5.2600, 'Lagg Weather'))->name('location.lagg');
Route::get('/lamlash', fn() => WeatherController::indexWithParams(55.5386, -5.1287, 'Lamlash Weather'))->name('location.lamlash');
Route::get('/lochranza', fn() => WeatherController::indexWithParams(55.7051, -5.2912, 'Lochranza Weather'))->name('location.lochranza');
Route::get('/machrie', fn() => WeatherController::indexWithParams(55.6580, -5.3400, 'Machrie Weather'))->name('location.machrie');
Route::get('/pirnmill', fn() => WeatherController::indexWithParams(55.7275, -5.3820, 'Pirnmill Weather'))->name('location.pirnmill');
Route::get('/sannox', fn() => WeatherController::indexWithParams(55.6625, -5.1560, 'Sannox Weather'))->name('location.sannox');
Route::get('/shiskine', fn() => WeatherController::indexWithParams(55.5150, -5.3150, 'Shiskine Weather'))->name('location.shiskine');
Route::get('/sliddery', fn() => WeatherController::indexWithParams(55.4630, -5.2830, 'Sliddery Weather'))->name('location.sliddery');
Route::get('/whiting-bay', fn() => WeatherController::indexWithParams(55.4920, -5.0950, 'Whiting Bay Weather'))->name('location.whiting-bay');

Route::get('/goat-fell', fn() => WeatherController::indexWithParams(55.6257, -5.1917, 'Goat Fell Weather'))->name('location.goat-fell');
Route::get('/caisteal-abhail', fn() => WeatherController::indexWithParams(55.6356, -5.2228, 'Caisteal Abhail Weather'))->name('location.caisteal-abhail');
Route::get('/beinn-tarsuinn', fn() => WeatherController::indexWithParams(55.6110, -5.2340, 'Beinn Tarsuinn Weather'))->name('location.beinn-tarsuinn');
Route::get('/beinn-nuis', fn() => WeatherController::indexWithParams(55.6167, -5.2421, 'Beinn Nuis Weather'))->name('location.beinn-nuis');
Route::get('/cir-mhor', fn() => WeatherController::indexWithParams(55.6180, -5.2100, 'Cir Mhor Weather'))->name('location.cir-mhor');
Route::get('/beinn-bharrain', fn() => WeatherController::indexWithParams(55.6833, -5.3264, 'Beinn Bharrain Weather'))->name('location.beinn-bharrain');
Route::get('/cioch-na-h-oighe', fn() => WeatherController::indexWithParams(55.6160, -5.2160, 'Cioch na h-Oighe Weather'))->name('location.cioch-na-h-oighe');
Route::get('/meall-nan-damh', fn() => WeatherController::indexWithParams(55.6160, -5.2660, 'Meall nan Damh Weather'))->name('location.meall-nan-damh');
Route::get('/beinn-bhreac', fn() => WeatherController::indexWithParams(55.6500, -5.2667, 'Beinn Bhreac Weather'))->name('location.beinn-bhreac');
Route::get('/ard-bheinn', fn() => WeatherController::indexWithParams(55.6000, -5.2500, 'Ard Bheinn Weather'))->name('location.ard-bheinn');
Route::get('/sail-chalmadale', fn() => WeatherController::indexWithParams(55.6720, -5.2500, 'Sail Chalmadale Weather'))->name('location.sail-chalmadale');
Route::get('/tighvein', fn() => WeatherController::indexWithParams(55.5640, -5.1840, 'Tighvein Weather'))->name('location.tighvein');
Route::get('/mullach-mor', fn() => WeatherController::indexWithParams(55.5240, -5.0720, 'Mullach Mor Weather'))->name('location.mullach-mor');
Route::get('/laggan', fn() => WeatherController::indexWithParams(55.5280, -5.0800, 'Laggan Weather'))->name('location.laggan');

Route::get('/ardrossan-harbour', fn() => WeatherController::indexWithParams(55.6400, -4.8210, 'Ardrossan Harbour Weather'))->name('location.ardrossan-harbour');
Route::get('/blackwaterfoot-beach', fn() => WeatherController::indexWithParams(55.5020, -5.3330, 'Blackwaterfoot Beach Weather'))->name('location.blackwaterfoot-beach');
Route::get('/brodick-bay', fn() => WeatherController::indexWithParams(55.5800, -5.1400, 'Brodick Bay Weather'))->name('location.brodick-bay');
Route::get('/brodick-pier', fn() => WeatherController::indexWithParams(55.5780, -5.1440, 'Brodick Pier Weather'))->name('location.brodick-pier');
Route::get('/clonaig-slip', fn() => WeatherController::indexWithParams(55.8740, -5.2450, 'Clonaig Slip Weather'))->name('location.clonaig-slip');
Route::get('/kildonnan-beach', fn() => WeatherController::indexWithParams(55.5100, -5.1000, 'Kildonnan Beach Weather'))->name('location.kildonnan-beach');
Route::get('/lamlash-bay', fn() => WeatherController::indexWithParams(55.5300, -5.1200, 'Lamlash Bay Weather'))->name('location.lamlash-bay');
Route::get('/lochranza-pier', fn() => WeatherController::indexWithParams(55.7070, -5.2940, 'Lochranza Pier Weather'))->name('location.lochranza-pier');
Route::get('/sannox-beach', fn() => WeatherController::indexWithParams(55.6650, -5.1500, 'Sannox Beach Weather'))->name('location.sannox-beach');
Route::get('/troon-harbour', fn() => WeatherController::indexWithParams(55.5430, -4.6800, 'Troon Harbour Weather'))->name('location.troon-harbour');
