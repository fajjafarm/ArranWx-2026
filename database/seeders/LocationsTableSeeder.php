<?php

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationsTableSeeder extends Seeder
{
    public function run()
    {
        $locations = [
            // Villages
            [
                'name' => 'Brodick',
                'alternative_name' => null,
                'type' => 'Village',
                'latitude' => 55.5765,
                'longitude' => -5.1497,
                'altitude' => 10,
            ],
            [
                'name' => 'Lamlash',
                'alternative_name' => null,
                'type' => 'Village',
                'latitude' => 55.5386,
                'longitude' => -5.1287,
                'altitude' => 15,
            ],
            [
                'name' => 'Lochranza',
                'alternative_name' => null,
                'type' => 'Village',
                'latitude' => 55.7051,
                'longitude' => -5.2912,
                'altitude' => 20,
            ],
            // Marine (Beaches and Bays)
            [
                'name' => 'Blackwaterfoot Beach',
                'alternative_name' => null,
                'type' => 'Marine',
                'latitude' => 55.5020,
                'longitude' => -5.3330,
                'altitude' => 0,
            ],
            [
                'name' => 'Sannox Beach',
                'alternative_name' => null,
                'type' => 'Marine',
                'latitude' => 55.6650,
                'longitude' => -5.1500,
                'altitude' => 0,
            ],
            [
                'name' => 'Brodick Bay',
                'alternative_name' => null,
                'type' => 'Marine',
                'latitude' => 55.5800,
                'longitude' => -5.1400,
                'altitude' => 0,
            ],
            [
                'name' => 'Lamlash Bay',
                'alternative_name' => null,
                'type' => 'Marine',
                'latitude' => 55.5300,
                'longitude' => -5.1200,
                'altitude' => 0,
            ],
            [
                'name' => 'Kildonnan Beach',
                'alternative_name' => null,
                'type' => 'Marine',
                'latitude' => 55.5100,
                'longitude' => -5.1000,
                'altitude' => 0,
            ],
            // Piers
            [
                'name' => 'Clonaig Slip',
                'alternative_name' => null,
                'type' => 'Pier',
                'latitude' => 55.8740,
                'longitude' => -5.2450,
                'altitude' => 5,
            ],
            [
                'name' => 'Lochranza Pier',
                'alternative_name' => null,
                'type' => 'Pier',
                'latitude' => 55.7070,
                'longitude' => -5.2940,
                'altitude' => 5,
            ],
            [
                'name' => 'Ardrossan Harbour',
                'alternative_name' => null,
                'type' => 'Pier',
                'latitude' => 55.6400,
                'longitude' => -4.8210,
                'altitude' => 5,
            ],
            [
                'name' => 'Troon Harbour',
                'alternative_name' => null,
                'type' => 'Pier',
                'latitude' => 55.5430,
                'longitude' => -4.6800,
                'altitude' => 5,
            ],
            [
                'name' => 'Brodick Pier',
                'alternative_name' => null,
                'type' => 'Pier',
                'latitude' => 55.5780,
                'longitude' => -5.1440,
                'altitude' => 5,
            ],
            // Hills
            [
                'name' => 'Goat Fell',
                'alternative_name' => null,
                'type' => 'Hill',
                'latitude' => 55.6257,
                'longitude' => -5.1917,
                'altitude' => 874,
            ],
            [
                'name' => 'Beinn Tarsuinn',
                'alternative_name' => null,
                'type' => 'Hill',
                'latitude' => 55.6110,
                'longitude' => -5.2340,
                'altitude' => 826,
            ],
            [
                'name' => 'Caisteal Abhail',
                'alternative_name' => null,
                'type' => 'Hill',
                'latitude' => 55.6356,
                'longitude' => -5.2228,
                'altitude' => 859,
            ],
            [
                'name' => 'Beinn Nuis',
                'alternative_name' => null,
                'type' => 'Hill',
                'latitude' => 55.6167,
                'longitude' => -5.2421,
                'altitude' => 792,
            ],
            [
                'name' => 'Beinn Bharrain',
                'alternative_name' => null,
                'type' => 'Hill',
                'latitude' => 55.6833,
                'longitude' => -5.3264,
                'altitude' => 721,
            ],
            [
                'name' => 'Beinn Bhreac',
                'alternative_name' => null,
                'type' => 'Hill',
                'latitude' => 55.6500,
                'longitude' => -5.2667,
                'altitude' => 575,
            ],
            [
                'name' => 'Mullach Mor (Holy Island)',
                'alternative_name' => null,
                'type' => 'Hill',
                'latitude' => 55.5240,
                'longitude' => -5.0720,
                'altitude' => 314,
            ],
            [
                'name' => 'Laggan',
                'alternative_name' => null,
                'type' => 'Hill',
                'latitude' => 55.5280,
                'longitude' => -5.0800,
                'altitude' => 100,
            ],
            [
                'name' => 'Tighvein',
                'alternative_name' => null,
                'type' => 'Hill',
                'latitude' => 55.5640,
                'longitude' => -5.1840,
                'altitude' => 458,
            ],
            [
                'name' => 'Sail Chalmadale',
                'alternative_name' => null,
                'type' => 'Hill',
                'latitude' => 55.6720,
                'longitude' => -5.2500,
                'altitude' => 480,
            ],
            [
                'name' => 'Ard Bheinn',
                'alternative_name' => null,
                'type' => 'Hill',
                'latitude' => 55.6000,
                'longitude' => -5.2500,
                'altitude' => 512,
            ],
            [
                'name' => 'Meall nan Damh',
                'alternative_name' => null,
                'type' => 'Hill',
                'latitude' => 55.6160,
                'longitude' => -5.2660,
                'altitude' => 570,
            ],
            [
                'name' => 'Cioch na h-Oighe',
                'alternative_name' => null,
                'type' => 'Hill',
                'latitude' => 55.6160,
                'longitude' => -5.2160,
                'altitude' => 660,
            ],
            [
                'name' => 'Cir Mhor',
                'alternative_name' => null,
                'type' => 'Hill',
                'latitude' => 55.6180,
                'longitude' => -5.2100,
                'altitude' => 799,
            ],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
