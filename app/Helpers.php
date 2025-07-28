<?php

if (!function_exists('get_temperature_color_class')) {
    function get_temperature_color_class($temperature)
    {
        if ($temperature === null) {
            return 'temp-cell-fallback';
        }
        $tempRanges = [-40, -30, -20, -15, -10, -8, -6, -4, -2, 0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 27, 30, 35, 40, 45, 50];
        foreach ($tempRanges as $range) {
            if ($temperature <= $range) {
                return 'temp-cell-' . ($range < 0 ? 'minus-' . abs($range) : $range);
            }
        }
        return 'temp-cell-' . ($temperature >= 50 ? '50' : 'fallback');
    }
}