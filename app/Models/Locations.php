<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name', 'alternative_name', 'type', 'latitude', 'longitude', 'altitude'];
}