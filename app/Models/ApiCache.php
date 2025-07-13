<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ApiCache extends Model
{
    protected $fillable = ['key', 'data', 'expires_at'];

    protected $casts = [
        'data' => 'array', // Automatically decode JSON to array
        'expires_at' => 'datetime',
    ];

    /**
     * Get cached data if not expired
     *
     * @param string $key
     * @return array|null
     */
    public static function getCached(string $key): ?array
    {
        $cache = self::where('key', $key)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        return $cache ? $cache->data : null;
    }

    /**
     * Store data in cache
     *
     * @param string $key
     * @param array $data
     * @param int $minutes
     * @return void
     */
    public static function setCached(string $key, array $data, int $minutes = 60): void
    {
        self::updateOrCreate(
            ['key' => $key],
            [
                'data' => $data,
                'expires_at' => Carbon::now()->addMinutes($minutes),
            ]
        );
    }
}