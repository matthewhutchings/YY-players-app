<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Sportsmonk extends Facade
{
      protected static function getFacadeAccessor()
      {
            return 'SportsmonkService';
      }
}
