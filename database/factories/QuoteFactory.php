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
        $movie = Movie::factory()->create();
        return [
            'user_id' => $movie->user_id,
            'movie_id' => $movie->id,
            'body' => $this->faker->paragraph(),
        ];
    }
}
