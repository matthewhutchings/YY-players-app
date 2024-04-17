<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition()
    {
        return [
            'sport_id' => 1,
            'sportsmonk_id' => $this->faker->numberBetween(1, 500),
            'country_id' => $this->faker->numberBetween(1, 500),
            'nationality_id' => $this->faker->numberBetween(1, 500),
            'nationality_name' => $this->faker->country,
            'position_id' => $this->faker->numberBetween(1, 30),
            'type_id' => $this->faker->numberBetween(1, 30),
            'common_name' => $this->faker->lexify('L. ??????'),
            'firstname' => $this->faker->firstName('male'),
            'lastname' => $this->faker->lastName,
            'name' => function (array $attributes) {
                return $attributes['firstname'] . ' ' . $attributes['lastname'];
            },
            'display_name' => function (array $attributes) {
                return $attributes['firstname'] . ' ' . $attributes['lastname'];
            },
            'image_path' => $this->faker->imageUrl(640, 480, 'sports'),
            'height' => $this->faker->numberBetween(150, 200),
            'weight' => $this->faker->numberBetween(50, 90),
            'date_of_birth' => $this->faker->date('Y-m-d', '-20 years'),
            'gender' => 'male',


        ];
    }
}
