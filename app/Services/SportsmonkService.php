<?php

namespace App\Services;

use App\Models\Player;
use Illuminate\Support\Facades\Http;

class SportsmonkService
{
      protected $baseUrl = 'https://api.sportmonks.com/v3';

      protected $apiKey;

      public function __construct()
      {
            $this->apiKey = config('services.sportmonks.api_key');
      }

      public function getPlayers($page = 1, $perPage = 30)
      {
            $url = $this->baseUrl . '/football/players?include=nationality;position&page=' . $page . '&per_page=' . $perPage;

            $response = Http::withHeaders([
                  'Authorization' => $this->apiKey
            ])->get($url);

            if ($response->successful()) {
                  return $response->json();
            }

            return null;
      }

      public function updateOrCreatePlayer($playerData)
      {
            $player = Player::updateOrCreate(
                  [
                        'sportsmonk_id' => $playerData['id']
                  ],
                  [
                        'firstname' => $playerData['firstname'],
                        'lastname' => $playerData['lastname'],
                        'nationality_id' => $playerData['nationality']['id'],
                        'nationality_name' => $playerData['nationality']['name'],
                        'position_id' => $playerData['position']['id'] ?? null,
                        'position_name' => $playerData['position']['name'] ?? null,
                        'date_of_birth' => $playerData['date_of_birth'],
                        'image_path' => $playerData['image_path'],
                        'common_name' => $playerData['common_name'],
                        'country_id' => $playerData['country_id'],
                        'sport_id' => $playerData['sport_id'],
                        'gender' => $playerData['gender'],
                        'type_id' => $playerData['type_id'],
                        'name' => $playerData['name'],
                        'display_name' => $playerData['display_name'],
                        'last_synced_at' => now()
                  ]
            );

            return $player;
      }
}
