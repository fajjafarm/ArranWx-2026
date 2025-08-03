<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherWarningController extends Controller
{
    public function index(Request $request)
    {
        $location = $request->input('location', 'Isle of Arran, KA27');

        // Fetch weather warnings from Met Office (mock example)
        $metOfficeWarnings = $this->fetchMetOfficeWarnings($location);
        $yrNoWarnings = $this->fetchYrNoWarnings($location);
        $marineWarnings = $this->fetchMarineWarnings($location);

        // Fetch travel warnings
        $busWarnings = $this->fetchTravelineBusWarnings($location);
        $trainWarnings = $this->fetchTravelineTrainWarnings($location);
        $roadWarnings = $this->fetchTrafficScotlandWarnings($location);

        // Fetch utility faults
        $powerFaults = $this->fetchSSEPowerFaults('KA27');
        $waterFaults = $this->fetchScottishWaterFaults('KA27');
        $phoneFaults = $this->fetchOpenreachFaults('KA27');

        return view('weather.warnings', compact(
            'metOfficeWarnings', 'yrNoWarnings', 'marineWarnings',
            'busWarnings', 'trainWarnings', 'roadWarnings',
            'powerFaults', 'waterFaults', 'phoneFaults', 'location'
        ));
    }

    public function emergency()
    {
        $emergencyContacts = [
            ['service' => 'Police (Emergency)', 'phone' => '999'],
            ['service' => 'Scottish Water', 'phone' => '0800 077 8778'],
            ['service' => 'SSE Power', 'phone' => '0800 300 999'],
            ['service' => 'Openreach (Phone/Broadband)', 'phone' => '0800 023 2023'],
            ['service' => 'North Ayrshire Council', 'phone' => '01294 310000'],
            ['service' => 'HM Coastguard (Arran)', 'phone' => '999'],
            ['service' => 'NHS 24', 'phone' => '111'],
        ];

        return view('weather.emergency', compact('emergencyContacts'));
    }

    private function fetchMetOfficeWarnings($location)
    {
        // Mock API call to Met Office DataPoint
        return [
            ['type' => 'Severe Weather', 'description' => 'Heavy rain expected in North Ayrshire', 'severity' => 'Amber', 'time' => '2025-08-04 08:00'],
            ['type' => 'Wind', 'description' => 'Strong winds on Isle of Arran', 'severity' => 'Yellow', 'time' => '2025-08-04 12:00'],
        ];
    }

    private function fetchYrNoWarnings($location)
    {
        // Mock API call to Yr.no
        return [
            ['type' => 'Coastal Warning', 'description' => 'High waves near Arran', 'severity' => 'Moderate', 'time' => '2025-08-04 10:00'],
        ];
    }

    private function fetchMarineWarnings($location)
    {
        // Mock marine forecast from Met Office/BBC Weather
        return [
            ['type' => 'Marine', 'description' => 'Gale force winds in Firth of Clyde', 'severity' => 'Severe', 'time' => '2025-08-04 14:00'],
        ];
    }

    private function fetchTravelineBusWarnings($location)
    {
        // Mock Traveline Scotland bus disruptions
        return [
            ['type' => 'Bus', 'description' => 'Service 324 delayed due to road works in Brodick', 'time' => '2025-08-04 09:00'],
        ];
    }

    private function fetchTravelineTrainWarnings($location)
    {
        // Mock Traveline Scotland train disruptions
        return [
            ['type' => 'Train', 'description' => 'No disruptions reported for Ayr to Glasgow line', 'time' => '2025-08-04 07:00'],
        ];
    }

    private function fetchTrafficScotlandWarnings($location)
    {
        // Mock Traffic Scotland road warnings
        return [
            ['type' => 'Road', 'description' => 'A841 closed near Lamlash due to flooding', 'time' => '2025-08-04 11:00'],
        ];
    }

    private function fetchSSEPowerFaults($postcode)
    {
        // Mock SSE Power Track faults
        return [
            ['type' => 'Power', 'description' => 'Power outage in Brodick, KA27', 'status' => 'Under investigation', 'time' => '2025-08-04 06:00'],
        ];
    }

    private function fetchScottishWaterFaults($postcode)
    {
        // Mock Scottish Water faults
        return [
            ['type' => 'Water', 'description' => 'Water supply disruption in Lamlash', 'status' => 'Scheduled maintenance', 'time' => '2025-08-04 13:00'],
        ];
    }

    private function fetchOpenreachFaults($postcode)
    {
        // Mock Openreach faults
        return [
            ['type' => 'Phone/Broadband', 'description' => 'Broadband fault in Whiting Bay', 'status' => 'Reported', 'time' => '2025-08-04 10:00'],
        ];
    }
}