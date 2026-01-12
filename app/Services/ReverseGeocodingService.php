<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ReverseGeocodingService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function getAddress($latitude, $longitude)
    {
        $response = Http::withHeaders([
            'User-Agent' => 'Laravel-App'
        ])->get('https://nominatim.openstreetmap.org/reverse', [
            'lat' => $latitude,
            'lon' => $longitude,
            'format' => 'json',
        ]);

        return $response['display_name'] ?? null;
    }
}
