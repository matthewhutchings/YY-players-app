<?php

namespace Tests\Feature;

use App\Models\Player;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayerTest extends TestCase
{

      use RefreshDatabase;

      /**
       * A basic test example.
       */
      public function test_the_application_returns_a_successful_response(): void
      {
            $response = $this->get('/');

            $response->assertStatus(200);
      }

      public function test_a_visitor_can_view_a_full_list_of_players()
      {
            $players = Player::factory()->count(5)->create();

            $response = $this->get('/');

            foreach ($players as $player) {
                  $response->assertSee($player->display_name, false);
            }
      }

      public function test_a_visitor_can_browse_players_by_nationality()
      {
            $nationality = 'English';
            $players = player::factory()->count(5)->create(['nationality_name' => $nationality]);

            $response = $this->get('/?nationality=' . $nationality);

            foreach ($players as $player) {
                  $response->assertSee($player->nationality_name, false);
            }
      }

      public function test_a_visitor_can_browse_players_across_multiple_pages()
      {
            Player::factory()->count(30)->create();

            $response = $this->get('/');

            $response->assertSee('1')
                  ->assertDontSee('Previous');

            $response = $this->get('/?page=2');

            $response->assertSee('2')
                  ->assertSee('Previous')
                  ->assertSee('Next');

            $lastPlayerOnFirstPage = Player::latest()->take(15)->first();
            $firstPlayerOnSecondPage = Player::latest()->skip(15)->take(1)->first();

            $response = $this->get('/');
            $response->assertDontSee($firstPlayerOnSecondPage->name);

            $response = $this->get('/?page=2');
            $response->assertSee($firstPlayerOnSecondPage->name)
                  ->assertDontSee($lastPlayerOnFirstPage->name);
      }

      public function test_a_visitor_can_search_players_by_name()
      {
            $searchedPlayer = Player::factory()->create(['name' => 'John Doe']);

            Player::factory()->count(3)->create();

            $response = $this->get('/?name=John Doe');

            $response->assertSee($searchedPlayer->name);

            $otherPlayers = Player::where('name', '!=', 'John Doe')->get();

            foreach ($otherPlayers as $otherPlayer) {
                  $response->assertDontSee($otherPlayer->name);
            }
      }

      public function test_a_visitor_can_view_a_players_details()
      {
            $player = Player::factory()->create();

            $response = $this->get("/player/{$player->id}");

            $response->assertSee($player->name, false)
                  ->assertSee($player->age, false)
                  ->assertSee($player->gender, false)
                  ->assertSee($player->nationality_name, false)
                  ->assertSee($player->position, false)
                  ->assertSee($player->photo, false);
      }
}
