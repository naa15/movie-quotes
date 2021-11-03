<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Movie;
use App\Models\Quote;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(4)->create();
        Movie::factory(7)->create([
            'user_id' => User::inRandomOrder()->first()
        ]);
        Quote::factory(3)->create([
            'movie_id' => Movie::inRandomOrder()->first(),
            'user_id' =>  User::inRandomOrder()->first()
        ]);
        Quote::factory(3)->create([
            'movie_id' => Movie::inRandomOrder()->first(),
            'user_id' =>  User::inRandomOrder()->first()
        ]);
        Quote::factory(4)->create([
            'movie_id' => Movie::inRandomOrder()->first(),
            'user_id' =>  User::inRandomOrder()->first()
        ]);
    }
}
