<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuroraForecast extends Model
{
    protected $fillable = [
        'time',
        'kp',
        'label',
        'cached_at',
    ];

    protected $casts = [
        'time' => 'datetime',
        'kp' => 'float',
        'cached_at' => 'datetime',
    ];
}