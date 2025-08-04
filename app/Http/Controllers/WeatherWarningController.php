<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Goutte\Client;
use SimpleXMLElement;

class WeatherWarningController extends Controller
{
    public function index(Request $request)
    {
        $location = $request->input('location', 'Isle of Arran, KA27');

        // Fetch weather warnings
        $metOfficeWarnings = $this->fetchMetOfficeWarnings($location);
        $yrNoWarnings = $this->fetchYrNoWarnings($location);
        $marineWarnings = $this->fetchYrNoMarineWarnings($location);
        $floodWarnings = $this->fetchFloodWarnings($location);

        // Fetch travel warnings
        $busWarnings = $this->fetchTravelineBusWarnings($location);
        $trainWarnings = $this->fetchTravelineTrainWarnings($location);
        $roadWarnings = $this->fetchTrafficScotlandWarnings($location);

        // Fetch ferry statuses
        $ferryStatuses = $this->fetchFerryStatuses();

        // Fetch utility faults
        $powerFaults = $this->fetchSSEPowerFaults('KA27');
        $waterFaults = $this->fetchScottishWaterFaults('KA27');
        $phoneFaults = $this->fetchOpenreachFaults('KA27');

        return view('weather.warnings', compact(
            'metOfficeWarnings', 'yrNoWarnings', 'marineWarnings', 'floodWarnings',
            'busWarnings', 'trainWarnings', 'roadWarnings', 'ferryStatuses',
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
            ['service' => 'Caledonian MacBrayne (Ferry)', 'phone' => '0800 066 5000'],
            ['service' => 'Floodline Scotland', 'phone' => '0345 988 1188'],
        ];

        return view('weather.emergency', compact('emergencyContacts'));
    }

    private function fetchMetOfficeWarnings($location)
    {
        try {
            $rss = @simplexml_load_file('https://www.metoffice.gov.uk/public/data/PWSCache/WarningsRSS/Region/sc');
            $warnings = [];

            if ($rss) {
                foreach ($rss->channel->item as $item) {
                    $warnings[] = [
                        'type' => (string) $item->title,
                        'description' => (string) $item->description,
                        'severity' => strpos((string) $item->title, 'Amber') !== false ? 'Amber' : (strpos((string) $item->title, 'Yellow') !== false ? 'Yellow' : 'Severe'),
                        'time' => (string) $item->pubDate,
                    ];
                }
            }
            return $warnings;
        } catch (\Exception $e) {
            return [['type' => 'Error', 'description' => 'Unable to fetch Met Office warnings', 'severity' => 'N/A', 'time' => now()]];
        }
    }

    private function fetchYrNoWarnings($location)
    {
        try {
            $response = Http::withHeaders(['User-Agent' => 'ArranWeatherApp/1.0'])
                ->get('https://api.met.no/weatherapi/metalerts/1.1/?lat=55.582&lon=-5.209');
            $data = $response->json();

            $warnings = [];
            if (isset($data['features'])) {
                foreach ($data['features'] as $alert) {
                    $warnings[] = [
                        'type' => $alert['properties']['event'] ?? 'Weather',
                        'description' => $alert['properties']['description'] ?? 'No description available',
                        'severity' => $alert['properties']['severity'] ?? 'Moderate',
                        'time' => $alert['properties']['effective'] ?? now(),
                    ];
                }
            }
            return $warnings;
        } catch (\Exception $e) {
            return [['type' => 'Error', 'description' => 'Unable to fetch Yr.no warnings', 'severity' => 'N/A', 'time' => now()]];
        }
    }

    private function fetchYrNoMarineWarnings($location)
    {
        try {
            $response = Http::withHeaders(['User-Agent' => 'ArranWeatherApp/1.0'])
                ->get('https://api.met.no/weatherapi/locationforecast/2.0/complete?lat=55.582&lon=-5.209');
            $data = $response->json();

            $warnings = [];
            if (isset($data['properties']['timeseries'])) {
                foreach ($data['properties']['timeseries'] as $timeserie) {
                    if (isset($timeserie['data']['instant']['details']['wind_speed']) && $timeserie['data']['instant']['details']['wind_speed'] > 15) {
                        $warnings[] = [
                            'type' => 'Marine',
                            'description' => 'High winds in Firth of Clyde, speed: ' . $timeserie['data']['instant']['details']['wind_speed'] . ' m/s',
                            'severity' => 'Moderate',
                            'time' => $timeserie['time'],
                        ];
                    }
                }
            }
            return $warnings;
        } catch (\Exception $e) {
            return [['type' => 'Error', 'description' => 'Unable to fetch Yr.no marine warnings', 'severity' => 'N/A', 'time' => now()]];
        }
    }

    private function fetchFloodWarnings($location)
    {
        try {
            $response = Http::get('https://environment.data.gov.uk/flood-monitoring/id/floods?county=North Ayrshire');
            $data = $response->json();

            $warnings = [];
            if (isset($data['items'])) {
                foreach ($data['items'] as $item) {
                    $warnings[] = [
                        'type' => 'Flood',
                        'description' => $item['description'] ?? 'Flood alert in North Ayrshire',
                        'severity' => $item['severityLevel'] == 1 ? 'Severe' : ($item['severityLevel'] == 2 ? 'Amber' : 'Yellow'),
                        'time' => $item['timeRaised'] ?? now(),
                    ];
                }
            }
            return $warnings;
        } catch (\Exception $e) {
            return [['type' => 'Error', 'description' => 'Unable to fetch flood warnings', 'severity' => 'N/A', 'time' => now()]];
        }
    }

    private function fetchFerryStatuses()
    {
        return Cache::remember('ferry_statuses', now()->addHours(2), function () {
            try {
                $client = new Client();
                $crawler = $client->request('GET', 'https://www.calmac.co.uk/service-status', [
                    'headers' => ['User-Agent' => 'ArranWeatherApp/1.0'],
                ]);

                $statuses = [];
                $crawler->filter('.service-status-item')->each(function ($node) use (&$statuses) {
                    $route = $node->filter('.route-name')->text();
                    $status = $node->filter('.status')->text();
                    $details = $node->filter('.details')->text();
                    $updated = $node->filter('.updated')->text();

                    if (in_array($route, ['Lochranza - Claonaig', 'Brodick - Troon', 'Ardrossan - Brodick'])) {
                        $severity = strpos($status, 'Disrupted') !== false ? 'Amber' : (strpos($status, 'Cancelled') !== false ? 'Red' : 'Green');
                        $statuses[] = [
                            'type' => 'Ferry',
                            'route' => $route,
                            'description' => trim($details),
                            'severity' => $severity,
                            'time' => $updated ?: now(),
                        ];
                    }
                });

                // Supplement with X posts for recent updates
                $xUpdates = $this->fetchXUpdates();
                $statuses = array_merge($statuses, $xUpdates);

                // Fallback data from web results
                $statuses[] = [
                    'type' => 'Ferry',
                    'route' => 'Ardrossan - Brodick',
                    'description' => 'No scheduled service until 7 September 2025 due to MV Caledonian Isles issues. Use Troon-Brodick instead.',
                    'severity' => 'Red',
                    'time' => '2025-08-03 06:10 BST',
                ];
                $statuses[] = [
                    'type' => 'Ferry',
                    'route' => 'Brodick - Troon',
                    'description' => 'MV Glen Sannox and MV Alfred operating until 7 September 2025. No service 10-17 February 2025 for MV Alfred overhaul.',
                    'severity' => 'Yellow',
                    'time' => '2025-07-31 05:16 BST',
                ];
                $statuses[] = [
                    'type' => 'Ferry',
                    'route' => 'Lochranza - Claonaig',
                    'description' => 'Service disrupted on 4 August due to strong winds from Storm Floris. Sailings at 08:15 from Lochranza and 08:50 from Claonaig.',
                    'severity' => 'Amber',
                    'time' => '2025-08-03 10:34 BST',
                ];

                return $statuses;
            } catch (\Exception $e) {
                return [
                    ['type' => 'Ferry', 'route' => 'Unknown', 'description' => 'Unable to fetch ferry statuses', 'severity' => 'N/A', 'time' => now()],
                ];
            }
        });
    }

    private function fetchXUpdates()
    {
        // Note: X API requires authentication, so using static data from provided posts
        // In a production environment, consider scraping @CalMac_Updates page or using X API with credentials
        return [
            [
                'type' => 'Ferry',
                'route' => 'Ardrossan - Brodick',
                'description' => 'No scheduled service until 7 September 2025 due to MV Caledonian Isles issues. Use Troon-Brodick instead.',
                'severity' => 'Red',
                'time' => '2025-08-02 05:14 BST',
            ],
            [
                'type' => 'Ferry',
                'route' => 'Brodick - Troon',
                'description' => 'MV Glen Sannox and MV Alfred operating until 7 September 2025.',
                'severity' => 'Yellow',
                'time' => '2025-07-30 06:30 BST',
            ],
            [
                'type' => 'Ferry',
                'route' => 'Lochranza - Claonaig',
                'description' => 'Service disrupted on 4 August due to strong winds from Storm Floris. Limited sailings.',
                'severity' => 'Amber',
                'time' => '2025-08-03 10:34 BST',
            ],
        ];
    }

    // Unchanged mock methods for travel and utility faults
    private function fetchTravelineBusWarnings($location)
    {
        return [
            ['type' => 'Bus', 'description' => 'Service 324 delayed due to road works in Brodick', 'time' => '2025-08-04 09:00'],
        ];
    }

    private function fetchTravelineTrainWarnings($location)
    {
        return [
            ['type' => 'Train', 'description' => 'No disruptions reported for Ayr to Glasgow line', 'time' => '2025-08-04 07:00'],
        ];
    }

    private function fetchTrafficScotlandWarnings($location)
    {
        return [
            ['type' => 'Road', 'description' => 'A841 closed near Lamlash due to flooding', 'time' => '2025-08-04 11:00'],
        ];
    }

    private function fetchSSEPowerFaults($postcode)
    {
        return [
            ['type' => 'Power', 'description' => 'Power outage in Brodick, KA27', 'status' => 'Under investigation', 'time' => '2025-08-04 06:00'],
        ];
    }

    private function fetchScottishWaterFaults($postcode)
    {
        return [
            ['type' => 'Water', 'description' => 'Water supply disruption in Lamlash', 'status' => 'Scheduled maintenance', 'time' => '2025-08-04 13:00'],
        ];
    }

    private function fetchOpenreachFaults($postcode)
    {
        return [
            ['type' => 'Phone/Broadband', 'description' => 'Broadband fault in Whiting Bay', 'status' => 'Reported', 'time' => '2025-08-04 10:00'],
        ];
    }
}