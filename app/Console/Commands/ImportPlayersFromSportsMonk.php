<?php

namespace App\Console\Commands;

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
        // Fetch players from SportsMonk API
        // create or update players in the database
    }
}
