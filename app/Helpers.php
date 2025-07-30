<?php

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

if (!function_exists('get_precipitation_color')) {
    function get_precipitation_color($precipitation) {
        if ($precipitation == 0) return '#ffffff';
        if ($precipitation <= 2) return '#afe0f9';
        if ($precipitation <= 5) return '#7dc4e6';
        if ($precipitation <= 10) return '#4da8d3';
        if ($precipitation <= 20) return '#1a8cc0';
        return '#0066b3'; // >20
    }
}

if (!function_exists('get_uv_color')) {
    function get_uv_color($uv) {
        if ($uv <= 2) return '#e6ffe6';
        if ($uv <= 5) return '#ccffcc';
        if ($uv <= 7) return '#ffff99';
        if ($uv <= 10) return '#ffd700';
        return '#ff8c00'; // 11+
    }
}

if (!function_exists('get_humidity_color')) {
    function get_humidity_color($humidity) {
        if ($humidity <= 30) return '#e6f3ff';
        if ($humidity <= 50) return '#b3d9ff';
        if ($humidity <= 70) return '#80cfff';
        if ($humidity <= 85) return '#4db8ff';
        return '#1a94ff'; // 86-100
    }
}

if (!function_exists('get_cloud_cover_color')) {
    function get_cloud_cover_color($cover) {
        if ($cover <= 10) return '#ffffff';
        if ($cover <= 50) return '#e6f3ff';
        if ($cover <= 90) return '#b3d9ff';
        return '#80cfff'; // 91-100
    }
}

if (!function_exists('get_cloud_base_color')) {
    function get_cloud_base_color($height) {
        if ($height <= 500) return '#ffffff';
        if ($height <= 2000) return '#e6f3ff';
        if ($height <= 5000) return '#b3d9ff';
        return '#80cfff'; // >5000
    }
}

if (!function_exists('get_snow_level_color')) {
    function get_snow_level_color($level) {
        if ($level == 0 || $level === '-') return '#ffffff';
        if ($level <= 1000) return '#e6f3ff';
        if ($level <= 2000) return '#b3d9ff';
        return '#80cfff'; // >2000
    }
}

if (!function_exists('convertWindSpeed')) {
    function convertWindSpeed($value, $fromUnit, $toUnit) {
        $conversions = [
            'mph' => ['mph' => 1, 'km/h' => 1.60934, 'knots' => 0.868976, 'm/s' => 0.44704],
            'km/h' => ['mph' => 0.621371, 'km/h' => 1, 'knots' => 0.539957, 'm/s' => 0.277778],
            'knots' => ['mph' => 1.15078, 'km/h' => 1.852, 'knots' => 1, 'm/s' => 0.514444],
            'm/s' => ['mph' => 2.23694, 'km/h' => 3.6, 'knots' => 1.94384, 'm/s' => 1]
        ];
        return $value * $conversions[$fromUnit][$toUnit];
    }
}

if (!function_exists('get_wind_color')) {
    function get_wind_color($value, $unit) {
        $knots = convertWindSpeed($value, $unit, 'knots');
        if ($knots < 1) return '#e6f3ff'; // Calm (light blue)
        if ($knots <= 3) return '#b3d9ff'; // Light air
        if ($knots <= 6) return '#80cfff'; // Light breeze
        if ($knots <= 10) return '#4db8ff'; // Gentle breeze
        if ($knots <= 16) return '#1a94ff'; // Moderate breeze
        if ($knots <= 21) return '#0073e6'; // Fresh breeze
        if ($knots <= 27) return '#005bb3'; // Strong breeze
        if ($knots <= 33) return '#004080'; // Near gale
        if ($knots <= 40) return '#00264d'; // Gale
        if ($knots <= 47) return '#001a33'; // Strong/severe gale
        if ($knots <= 55) return '#000d1a'; // Storm
        if ($knots <= 63) return '#000000'; // Violent storm
        if ($knots >= 64) return '#330000'; // Hurricane-force
        return '#ff0000'; // Fallback (red)
    }
}

if (!function_exists('get_wind_text_color')) {
    function get_wind_text_color($value, $unit) {
        $knots = convertWindSpeed($value, $unit, 'knots');
        return $knots <= 47 ? 'black' : 'white'; // Black text up to Strong/severe gale, white beyond
    }
}