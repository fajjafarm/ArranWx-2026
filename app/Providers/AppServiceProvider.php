<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (!function_exists('get_temperature_color')) {
    function get_temperature_color($temperature) {
        $colors = [
            ['min' => -PHP_INT_MAX, 'max' => -40, 'color' => '#01081e'],
            ['min' => -40, 'max' => -30, 'color' => '#020f39'],
            ['min' => -30, 'max' => -20, 'color' => '#02154f'],
            ['min' => -20, 'max' => -15, 'color' => '#082376'],
            ['min' => -15, 'max' => -10, 'color' => '#435897'],
            ['min' => -10, 'max' => -8, 'color' => '#3075ac'],
            ['min' => -8, 'max' => -6, 'color' => '#38aec4'],
            ['min' => -6, 'max' => -4, 'color' => '#38aec4'],
            ['min' => -4, 'max' => -2, 'color' => '#60c3c1'],
            ['min' => -2, 'max' => 0, 'color' => '#7fcebc'],
            ['min' => 0, 'max' => 2, 'color' => '#91d5ba'],
            ['min' => 2, 'max' => 4, 'color' => '#b6e3b7'],
            ['min' => 4, 'max' => 6, 'color' => '#cfebb2'],
            ['min' => 6, 'max' => 8, 'color' => '#e3ecab'],
            ['min' => 8, 'max' => 10, 'color' => '#ffeea1'],
            ['min' => 10, 'max' => 12, 'color' => '#ffe796'],
            ['min' => 12, 'max' => 14, 'color' => '#ffd881'],
            ['min' => 14, 'max' => 16, 'color' => '#ffc96c'],
            ['min' => 16, 'max' => 18, 'color' => '#ffc261'],
            ['min' => 18, 'max' => 20, 'color' => '#ffb34c'],
            ['min' => 20, 'max' => 22, 'color' => '#fc9f46'],
            ['min' => 22, 'max' => 24, 'color' => '#f67639'],
            ['min' => 24, 'max' => 27, 'color' => '#e13d32'],
            ['min' => 27, 'max' => 30, 'color' => '#c30031'],
            ['min' => 30, 'max' => 35, 'color' => '#70001c'],
            ['min' => 35, 'max' => 40, 'color' => '#3a000e'],
            ['min' => 40, 'max' => 45, 'color' => '#1f0007'],
            ['min' => 45, 'max' => PHP_INT_MAX, 'color' => '#100002'],
        ];

        foreach ($colors as $range) {
            if ($temperature >= $range['min'] && $temperature < $range['max']) {
                return $range['color'];
            }
        }
        return '#ff0000'; // Fallback color
    }
}

if (!function_exists('get_temperature_text_color')) {
    function get_temperature_text_color($temperature) {
        $thresholds = [
            ['min' => -PHP_INT_MAX, 'max' => -10, 'color' => 'white'],
            ['min' => -10, 'max' => 30, 'color' => 'black'],
            ['min' => 30, 'max' => PHP_INT_MAX, 'color' => 'white'],
        ];

        foreach ($thresholds as $range) {
            if ($temperature >= $range['min'] && $temperature < $range['max']) {
                return $range['color'];
            }
        }
        return 'white'; // Fallback color
    }
}
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
