<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Earthquake extends Model
{
    protected $fillable = [
        'time',
        'place',
        'latitude',
        'longitude',
        'depth',
        'magnitude',
        'link',
    ];

    protected $casts = [
        'time' => 'datetime',
        'latitude' => 'float',
        'longitude' => 'float',
        'depth' => 'integer',
        'magnitude' => 'float',
    ];
}