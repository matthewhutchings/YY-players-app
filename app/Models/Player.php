<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'sportsmonk_id', 'firstname', 'lastname', 'nationality_id', 'nationality_name',
        'position_id', 'position_name', 'date_of_birth', 'image_path', 'common_name',
        'country_id', 'sport_id', 'gender', 'type_id', 'name', 'display_name', 'last_synced_at'
    ];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->date_of_birth)->age;
    }

    public function getGenderAttribute($value)
    {
        return ucfirst($value);
    }
}
