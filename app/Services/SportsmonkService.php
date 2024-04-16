<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SportsmonkService
{
      protected $baseUrl = 'https://api.sportmonks.com/v3';

      protected $apiKey;

      public function __construct()
      {
            $this->apiKey = config('services.sportmonks.api_key');
      }

      public function getPlayers()
      {
            $url = $this->baseUrl . '/football/players?include=nationality';

            $response = Http::withHeaders([
                  'Authorization' => $this->apiKey
            ])->get($url);

            if ($response->successful()) {
                  return $response->json();
            }

            return null;
      }
}
