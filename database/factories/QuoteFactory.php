<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'movie_id' => Movie::inRandomOrder()->first()->id,
            'body' => $this->faker->paragraph(),
        ];
    }
}
