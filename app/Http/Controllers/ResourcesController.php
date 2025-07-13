<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\Earthquake;
use App\Models\AuroraForecast;
use Carbon\Carbon;
use SimpleXMLElement;

class ResourcesController extends Controller
{
    public function shipAis()
    {
        try {
            $mapParams = [
                'width' => '100%',
                'height' => '600',
                'latitude' => 55.6,
                'longitude' => -5.3,
                'zoom' => 11,
                'names' => true,
            ];
            $vesselLinks = [
                ['name' => 'MV Caledonian Isles', 'route' => 'resources.ship-caledonian-isles', 'status' => 'In Greenock for repairs until June 13, 2025', 'imo' => '9050567'],
                ['name' => 'MV Catriona', 'route' => 'resources.ship-catriona', 'status' => 'Operating Lochranza-Claonaig', 'imo' => '9692325'],
                ['name' => 'MV Glen Sannox', 'route' => 'resources.ship-glen-sannox', 'status' => 'Operating Ardrossan-Brodick', 'imo' => '9791199'],
                ['name' => 'MV Alfred', 'route' => 'resources.ship-alfred', 'status' => 'Operating Troon-Brodick', 'imo' => '9370563'],
            ];

            \Log::info('Ship AIS map rendered', ['vessel_count' => count($vesselLinks), 'vessels' => array_column($vesselLinks, 'name')]);
            return view('resources.ship-ais', compact('mapParams', 'vesselLinks'));
        } catch (\Exception $e) {
            \Log::error('Ship AIS processing failed', ['error' => $e->getMessage()]);
            return view('resources.ship-ais', ['mapParams' => [], 'vesselLinks' => []])
                ->with('error', 'Unable to load ship AIS map.');
        }
    }

    public function shipCaledonianIsles()
    {
        try {
            $mapParams = [
                'width' => '100%',
                'height' => '600',
                'latitude' => 55.95, // Greenock
                'longitude' => -4.76,
                'zoom' => 11,
                'names' => true,
                'imo' => '9051284',
                'show_track' => true,
            ];
            $vesselName = 'MV Caledonian Isles';
            $vesselStatus = 'In Greenock for repairs until June 13, 2025. Expected to resume Ardrossan-Brodick route.';
            \Log::info('MV Caledonian Isles page rendered', ['imo' => $mapParams['imo']]);
            return view('resources.ship-vessel', compact('mapParams', 'vesselName', 'vesselStatus'));
        } catch (\Exception $e) {
            \Log::error('MV Caledonian Isles page failed', ['error' => $e->getMessage()]);
            return view('resources.ship-vessel', ['mapParams' => [], 'vesselName' => 'MV Caledonian Isles'])
                ->with('error', 'Unable to load vessel data.');
        }
    }

    public function shipCatriona()
    {
        try {
            $mapParams = [
                'width' => '100%',
                'height' => '600',
                'latitude' => 55.6,
                'longitude' => -5.3,
                'zoom' => 11,
                'names' => true,
                'imo' => '9759862',
                'show_track' => true,
            ];
            $vesselName = 'MV Catriona';
            $vesselStatus = 'Operating Lochranza-Claonaig route.';
            \Log::info('MV Catriona page rendered', ['imo' => $mapParams['imo']]);
            return view('resources.ship-vessel', compact('mapParams', 'vesselName', 'vesselStatus'));
        } catch (\Exception $e) {
            \Log::error('MV Catriona page failed', ['error' => $e->getMessage()]);
            return view('resources.ship-vessel', ['mapParams' => [], 'vesselName' => 'MV Catriona'])
                ->with('error', 'Unable to load vessel data.');
        }
    }

    public function shipGlenSannox()
    {
        try {
            $mapParams = [
                'width' => '100%',
                'height' => '600',
                'latitude' => 55.6,
                'longitude' => -5.3,
                'zoom' => 11,
                'names' => true,
                'imo' => '9794513',
                'show_track' => true,
            ];
            $vesselName = 'MV Glen Sannox';
            $vesselStatus = 'Operating Ardrossan-Brodick route.';
            \Log::info('MV Glen Sannox page rendered', ['imo' => $mapParams['imo']]);
            return view('resources.ship-vessel', compact('mapParams', 'vesselName', 'vesselStatus'));
        } catch (\Exception $e) {
            \Log::error('MV Glen Sannox page failed', ['error' => $e->getMessage()]);
            return view('resources.ship-vessel', ['mapParams' => [], 'vesselName' => 'MV Glen Sannox'])
                ->with('error', 'Unable to load vessel data.');
        }
    }

    public function shipAlfred()
    {
        try {
            $mapParams = [
                'width' => '100%',
                'height' => '600',
                'latitude' => 55.6,
                'longitude' => -5.3,
                'zoom' => 11,
                'names' => true,
                'imo' => '9823467',
                'show_track' => true,
            ];
            $vesselName = 'MV Alfred';
            $vesselStatus = 'Operating Troon-Brodick route.';
            \Log::info('MV Alfred page rendered', ['imo' => $mapParams['imo']]);
            return view('resources.ship-vessel', compact('mapParams', 'vesselName', 'vesselStatus'));
        } catch (\Exception $e) {
            \Log::error('MV Alfred page failed', ['error' => $e->getMessage()]);
            return view('resources.ship-vessel', ['mapParams' => [], 'vesselName' => 'MV Alfred'])
                ->with('error', 'Unable to load vessel data.');
        }
    }

    public function earthquakes()
    {
        try {
            $endTime = Carbon::now();
            $startTime = $endTime->copy()->subDays(60);

            Earthquake::where('time', '<', now()->subDays(90))->delete();

            $earthquakeData = Cache::remember('bgs_earthquakes', now()->addHours(4), function () use ($startTime, $endTime) {
                try {
                    $response = Http::retry(3, 1000)->timeout(10)->get('https://quakes.bgs.ac.uk/feeds/MhSeismology.xml');

                    if (!$response->successful()) {
                        \Log::error('BGS GeoRSS request failed', ['status' => $response->status(), 'body' => substr($response->body(), 0, 500)]);
                        return $this->fetchFromDatabase($startTime, $endTime);
                    }

                    $body = $response->body();
                    if (empty($body) || strpos($body, '<rss') === false) {
                        \Log::error('BGS feed is empty or invalid', ['body' => substr($body, 0, 500)]);
                        return $this->fetchFromDatabase($startTime, $endTime);
                    }

                    $xml = new SimpleXMLElement($body);
                    if (!isset($xml->channel->item)) {
                        \Log::warning('BGS feed has no items', ['xml' => (string) $xml->asXML()]);
                        return $this->fetchFromDatabase($startTime, $endTime);
                    }

                    $items = [];
                    foreach ($xml->channel->item as $item) {
                        $description = (string) $item->description;
                        preg_match('/Origin date\/time: (.+?) ; Location: (.+?) ; Lat\/long: ([-\d.]+),([-\d.]+)(?: ; Depth: (\d+) km)? ; Magnitude:\s*([-\d.]+)/', $description, $matches);

                        if ($matches) {
                            $quakeTime = Carbon::parse($matches[1]);
                            $quakeData = [
                                'time' => $quakeTime,
                                'place' => trim($matches[2]),
                                'latitude' => (float) $matches[3],
                                'longitude' => (float) $matches[4],
                                'depth' => isset($matches[5]) ? (int) $matches[5] : 0,
                                'magnitude' => (float) $matches[6],
                                'link' => (string) $item->link,
                            ];

                            Earthquake::updateOrCreate(
                                ['time' => $quakeTime, 'place' => $quakeData['place']],
                                $quakeData
                            );

                            if ($quakeTime->gte($startTime)) {
                                $items[] = $quakeData;
                            }
                        } else {
                            \Log::warning('Failed to parse BGS item', ['description' => $description]);
                            $title = (string) $item->title;
                            if (preg_match('/M ([-\d.]+) :(.+)/', $title, $titleMatches)) {
                                $quakeTime = Carbon::parse($item->pubDate);
                                $quakeData = [
                                    'time' => $quakeTime,
                                    'place' => trim($titleMatches[2]),
                                    'latitude' => (float) $item->{'geo:lat'},
                                    'longitude' => (float) $item->{'geo:long'},
                                    'depth' => 0,
                                    'magnitude' => (float) $titleMatches[1],
                                    'link' => (string) $item->link,
                                ];

                                Earthquake::updateOrCreate(
                                    ['time' => $quakeTime, 'place' => $quakeData['place']],
                                    $quakeData
                                );

                                if ($quakeTime->gte($startTime)) {
                                    $items[] = $quakeData;
                                }
                            }
                        }
                    }

                    \Log::info('BGS earthquake count fetched', ['count' => count($items)]);
                } catch (\Exception $e) {
                    \Log::error('BGS feed processing failed', ['error' => $e->getMessage()]);
                    return $this->fetchFromDatabase($startTime, $endTime);
                }

                return $this->fetchFromDatabase($startTime, $endTime);
            });

            usort($earthquakeData, fn($a, $b) => $a['distance'] <=> $b['distance']);

            $message = empty($earthquakeData) ? 'No earthquakes recorded near Arran in the last 60 days.' : null;
            $copyright = 'Contains British Geological Survey materials © UKRI ' . date('Y') . '.';

            \Log::info('Earthquake data rendered', ['count' => count($earthquakeData)]);

            return view('resources.earthquakes', compact('earthquakeData', 'message', 'copyright'));
        } catch (\Exception $e) {
            \Log::error('Earthquake processing failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            Cache::forget('bgs_earthquakes');
            $message = 'Unable to fetch or process earthquake data. Displaying cached data if available.';
            $copyright = 'Contains British Geological Survey materials © UKRI ' . date('Y') . '.';

            $earthquakeData = $this->fetchFromDatabase($startTime, $endTime);
            usort($earthquakeData, fn($a, $b) => $a['distance'] <=> $b['distance']);

            return view('resources.earthquakes', compact('earthquakeData', 'message', 'copyright'));
        }
    }

    protected function fetchFromDatabase($startTime, $endTime)
    {
        return Earthquake::whereBetween('time', [$startTime, $endTime])
            ->orderBy('time', 'desc')
            ->get()
            ->map(function ($quake) {
                $highlight = stripos($quake->place, 'Arran') !== false ||
                             stripos($quake->place, 'Clyde') !== false ||
                             $this->calculateDistance(55.6, -5.3, $quake->latitude, $quake->longitude) < 20;
                $distance = $this->calculateDistance(55.6, -5.3, $quake->latitude, $quake->longitude);
                return [
                    'time' => $quake->time->toDateTimeString(),
                    'place' => $quake->place,
                    'magnitude' => $quake->magnitude,
                    'distance' => round($distance),
                    'highlight' => $highlight,
                    'link' => $quake->link,
                    'latitude' => $quake->latitude,
                    'longitude' => $quake->longitude,
                ];
            })->toArray();
    }

    protected function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 3958.8; // Miles
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        $dLat = $lat2 - $lat1;
        $dLon = $lon2 - $lon1;

        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos($lat1) * cos($lat2) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }

    public function aurora()
    {
        try {
            $cachedForecast = AuroraForecast::where('cached_at', '>=', now()->subHour())
                ->orderBy('time')
                ->get();

            \Log::debug('Aurora cache check', ['count' => $cachedForecast->count()]);

            if ($cachedForecast->isNotEmpty()) {
                $forecast = $cachedForecast->map(function ($entry) {
                    return [
                        'time' => $entry->time->toDateTimeString(),
                        'kp' => $entry->kp,
                        'label' => $entry->label,
                    ];
                })->toArray();
                $max_kp = $cachedForecast->max('kp');
                $message = $this->getAuroraMessage($max_kp);
                $auroraData = ['kp_forecast' => $forecast, 'message' => $message, 'max_kp' => $max_kp];
            } else {
                $response = Http::retry(3, 1000)->timeout(10)->get('https://services.swpc.noaa.gov/products/noaa-planetary-k-index-forecast.json');

                if (!$response->successful()) {
                    \Log::error('NOAA Kp forecast request failed', ['status' => $response->status(), 'body' => substr($response->body(), 0, 500)]);
                    $auroraData = $this->getFallbackAuroraData();
                } else {
                    $data = $response->json();
                    \Log::debug('NOAA Kp API response', ['data' => array_slice($data, 0, 5)]);
                    $kp_forecast = array_slice($data, 1);
                    $forecast = [];
                    $max_kp = 0;

                    foreach ($kp_forecast as $entry) {
                        try {
                            $time = Carbon::parse($entry[0]);
                            $kp = (float) $entry[1];
                            if ($time->gte(now()->startOfDay()) && $time->lte(now()->addDays(3))) {
                                $forecast[] = [
                                    'time' => $time->toDateTimeString(),
                                    'kp' => $kp,
                                    'label' => $time->format('M d H:i'),
                                ];
                                $max_kp = max($max_kp, $kp);
                            }
                        } catch (\Exception $e) {
                            \Log::warning('Failed to parse Kp forecast entry', ['entry' => $entry, 'error' => $e->getMessage()]);
                        }
                    }

                    \Log::debug('Parsed Kp forecast', ['count' => count($forecast), 'sample' => array_slice($forecast, 0, 3)]);

                    if (!empty($forecast)) {
                        AuroraForecast::truncate();
                        foreach ($forecast as $item) {
                            AuroraForecast::create([
                                'time' => $item['time'],
                                'kp' => $item['kp'],
                                'label' => $item['label'],
                                'cached_at' => now(),
                            ]);
                        }
                    }

                    $message = $this->getAuroraMessage($max_kp);
                    $auroraData = ['kp_forecast' => $forecast, 'message' => $message, 'max_kp' => $max_kp];

                    if (empty($forecast)) {
                        \Log::warning('No valid Kp forecast data found');
                        $auroraData = $this->getFallbackAuroraData();
                    }
                }
            }

            \Log::info('Aurora forecast rendered', ['kp_count' => count($auroraData['kp_forecast'])]);

            return view('resources.aurora', compact('auroraData'));
        } catch (\Exception $e) {
            \Log::error('Aurora processing failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            $auroraData = $this->getFallbackAuroraData();
            return view('resources.aurora', compact('auroraData'));
        }
    }

    protected function getAuroraMessage($max_kp)
    {
        if ($max_kp >= 7) {
            return 'Strong geomagnetic storm (G3–G5) expected. Aurora may be visible across the UK, including southern England.';
        } elseif ($max_kp >= 5) {
            return 'Moderate geomagnetic activity (G1–G2) expected. Aurora likely visible in northern and central UK, including Scotland and Northern Ireland.';
        } elseif ($max_kp >= 4) {
            return 'Minor geomagnetic activity expected. Aurora may be visible in northern Scotland.';
        } else {
            return 'Low geomagnetic activity. Aurora unlikely to be visible in the UK, except possibly in far northern Scotland under clear skies.';
        }
    }

    protected function getFallbackAuroraData()
    {
        $startTime = now()->startOfDay();
        $forecast = [];
        for ($i = 0; $i < 24; $i++) {
            $time = $startTime->copy()->addHours($i * 3);
            $forecast[] = [
                'time' => $time->toDateTimeString(),
                'kp' => 3.0,
                'label' => $time->format('M d H:i'),
            ];
        }
        \Log::info('Using fallback aurora data', ['count' => count($forecast)]);
        return [
            'kp_forecast' => $forecast,
            'message' => 'Unable to fetch aurora forecast data. Displaying sample data.',
            'max_kp' => 3.0,
        ];
    }

    public function flightRadar()
    {
        try {
            $mapUrl = 'https://www.flightradar24.com/55.6,-5.3/10';
            \Log::info('FlightRadar map rendered', ['url' => $mapUrl]);
            return view('resources.flight-radar', compact('mapUrl'));
        } catch (\Exception $e) {
            \Log::error('FlightRadar processing failed', ['error' => $e->getMessage()]);
            $mapUrl = '';
            return view('resources.flight-radar', compact('mapUrl'))->with('error', 'Unable to load flight radar map.');
        }
    }

    public function lightning()
    {
        try {
            $mapUrl = 'https://www.blitzortung.org/en/live_lightning_maps.php?map=10';
            \Log::info('Lightning map rendered', ['url' => $mapUrl]);
            return view('resources.lightning', compact('mapUrl'));
        } catch (\Exception $e) {
            \Log::error('Lightning processing failed', ['error' => $e->getMessage()]);
            $mapUrl = '';
            return view('resources.lightning', compact('mapUrl'))->with('error', 'Unable to load lightning map.');
        }
    }

    public function tides($location)
    {
        try {
            $locations = ['Lamlash', 'Brodick', 'Lochranza'];
            if (!in_array($location, $locations)) {
                throw new \Exception('Invalid location');
            }

            $tideData = [
                $location => [
                    'date' => Carbon::today()->toDateString(),
                    'high_tides' => [
                        ['time' => '06:30', 'height' => '3.2m'],
                        ['time' => '18:45', 'height' => '3.4m'],
                    ],
                    'low_tides' => [
                        ['time' => '12:15', 'height' => '0.8m'],
                        ['time' => '00:30', 'height' => '0.7m'],
                    ],
                ]
            ];

            \Log::info('Tide data rendered', ['location' => $location]);
            return view('resources.tides', compact('tideData', 'location'));
        } catch (\Exception $e) {
            \Log::error('Tides processing failed', ['error' => $e->getMessage()]);
            return view('resources.tides', ['location' => $location, 'tideData' => []])
                ->with('error', 'Unable to load tide data.');
        }
    }

    public function webcams()
    {
        $webcams = [
            [
                'title' => 'Brodick Ferry Terminal (CMAL)',
                'url' => 'https://player.twitch.tv/?channel=cmalbrodick&parent=' . request()->getHost(),
                'source' => 'Caledonian Maritime Assets Ltd',
                'type' => 'iframe',
            ],
            [
                'title' => 'Lochranza Ferry Terminal (CMAL)',
                'url' => 'https://player.twitch.tv/?channel=cmallochranza&parent=' . request()->getHost(),
                'source' => 'Caledonian Maritime Assets Ltd',
                'type' => 'iframe',
            ],
            [
                'title' => 'A760 Road Cam',
                'url' => 'https://alerts.live-website.com/roadcamimages/2382_cam1.jpg',
                'source' => 'North Ayrshire Council',
                'type' => 'image',
            ],
            [
                'title' => 'B880 String Road Cam',
                'url' => 'https://alerts.live-website.com/roadcamimages/2382_cam2.jpg',
                'source' => 'North Ayrshire Council',
                'type' => 'image',
            ],
            [
                'title' => 'Brodick Bay towards Goatfell',
                'url' => 'https://www.cottagesonarran.co.uk/arran-webcam/',
                'source' => 'Cottages on Arran',
                'type' => 'link',
            ],
            [
                'title' => 'Brodick Ferry Port',
                'url' => 'https://www.cottagesonarran.co.uk/arran-webcam/',
                'source' => 'Cottages on Arran',
                'type' => 'link',
            ],
        ];

        $nacRoadCamsLink = 'https://www.north-ayrshire.gov.uk/roads-and-parking/road-cams';

        return view('resources.webcams', compact('webcams', 'nacRoadCamsLink'));
    }
}