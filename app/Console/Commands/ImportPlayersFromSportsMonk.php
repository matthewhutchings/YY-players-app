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

        $players = Sportsmonk::getPlayers();

        foreach ($players['data'] as $player) {
            $this->info('Importing player ' . $player['firstname']);
        }

        $this->info('Imported ' . count($players['data']) . ' players.');
    }
}
