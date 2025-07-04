<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherController extends Controller
{
    /**
     * Display the main weather dashboard.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Get lat and lon from query parameters, default to Arran center
        $lat = $request->query('lat', 55.5820);
        $lon = $request->query('lon', -5.2093);
        $title = 'Arran Weather'; // Set page title

        return view('index', compact('lat', 'lon', 'title'));
    }

    /**
     * Fetch weather forecast for a given latitude and longitude.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWeather(Request $request)
    {
        // Validate input parameters
        $request->validate([
            'lat' => 'required|numeric|between:-90,90',
            'lon' => 'required|numeric|between:-180,180',
        ]);

        $lat = $request->query('lat');
        $lon = $request->query('lon');

        try {
            // Fetch weather data from yr.no (Met.no) API
            $response = Http::withHeaders([
                'User-Agent' => 'ArranWeather/1.0 (contact@arranweather.com)',
            ])->get("https://api.met.no/weatherapi/locationforecast/2.0/compact?lat={$lat}&lon={$lon}");

            if ($response->successful()) {
                $data = $response->json();

                // Extract and format the first 5 forecast entries
                $forecasts = collect($data['properties']['timeseries'])
                    ->take(5)
                    ->map(function ($entry) {
                        return [
                            'time' => date('Y-m-d H:i:s', strtotime($entry['time'])),
                            'temperature' => $entry['data']['instant']['details']['air_temperature'] ?? 'N/A',
                            'condition' => $entry['data']['next_1_hours']['summary']['symbol_code'] ?? 'N/A',
                            'precipitation' => $entry['data']['next_1_hours']['details']['precipitation_amount'] ?? 0,
                            'wind_speed' => $entry['data']['instant']['details']['wind_speed'] ?? 'N/A',
                        ];
                    });

                return response()->json([
                    'status' => 'success',
                    'data' => $forecasts,
                ]);
            } else {
                Log::error('yr.no API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return response()->json([
                    'status' => 'error',
                    'message' => 'Unable to fetch weather data from yr.no',
                ], 500);
            }
        } catch (\Exception $e) {
            Log::error('Error fetching weather data', [
                'error' => $e->getMessage(),
                'lat' => $lat,
                'lon' => $lon,
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while fetching weather data',
            ], 500);
        }
    }
}