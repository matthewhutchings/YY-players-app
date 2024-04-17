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

      public function importSportsmonkPlayer($playerData)
      {
            $player = Player::updateOrCreate(
                  [
                        'sportsmonk_id' => $playerData['id']
                  ],
                  [
                        'firstname' => $playerData['firstname'] ?? null,
                        'lastname' => $playerData['lastname'] ?? null,
                        'nationality_id' => $playerData['nationality']['id'] ?? null,
                        'nationality_name' => $playerData['nationality']['name'] ?? null,
                        'position_id' => $playerData['position']['id'] ?? null,
                        'position_name' => $playerData['position']['name'] ?? null,
                        'date_of_birth' => $playerData['date_of_birth'] ?? null,
                        'image_path' => $playerData['image_path'] ?? null,
                        'common_name' => $playerData['common_name'] ?? null,
                        'country_id' => $playerData['country_id'] ?? null,
                        'sport_id' => $playerData['sport_id'] ?? null,
                        'gender' => $playerData['gender'] ?? null,
                        'type_id' => $playerData['type_id'] ?? null,
                        'name' => $playerData['name'] ?? null,
                        'display_name' => $playerData['display_name'] ?? null,
                        'last_synced_at' => now()
                  ]
            );

            return $player;
      }
}
