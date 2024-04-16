<?php

namespace App\Console\Commands;

use App\Facades\Sportsmonk;
use Illuminate\Console\Command;

class ImportPlayersFromSportsMonk extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-players-from-sports-monk';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run this command to import players from SportsMonk API.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting Import of players.');
        $playersCount = 0;
        $page = 1;
        $hasMorePages = true;

        while ($hasMorePages) {
            $response = Sportsmonk::getPlayers($page);

            if (!empty($response['data'])) {
                foreach ($response['data'] as $player) {
                    $playersCount++;
                    $this->info('Importing player ' . $player['firstname']);
                    Sportsmonk::updateOrCreatePlayer($player);
                }
            }

            $hasMorePages = $response['pagination']['has_more'];
            $page++;
        }


        $this->info('Imported ' . $playersCount . ' players.');
    }
}
