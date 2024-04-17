<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\SportsmonkService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class SportsmonkServiceTest extends TestCase
{
    public function test_sportsmonk_service()
    {

        $defaultData = file_get_contents(base_path('tests/Data/players_page1.json'));

        $defaultData = json_decode($defaultData, true);

        Http::fake([
            'api.sportmonks.com/v3/football/players?include=nationality&page=1&per_page=30' => Http::response($defaultData, 200)
        ]);

        $service = new SportsmonkService();

        $response = $service->getPlayers();

        $this->assertEquals(1, $response['pagination']['current_page']);
    }
}
