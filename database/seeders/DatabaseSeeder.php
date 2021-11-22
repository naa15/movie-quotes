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
        $user = User::factory()->create();
        $movie = Movie::factory()->create([
            'user_id' => $user->id,
        ]);
        $movie->setTranslation('title', 'en', 'The Father of Soldier')
              ->setTranslation('title', 'ka', 'ჯარისკაცის მამა')
              ->save();
        $quote = Quote::factory()->create([
            'user_id' => $user->id,
            'movie_id' => $movie->id,
        ]);
        $quote->setTranslation('body', 'en', 'What should I tell your mother?!')
        ->setTranslation('body', 'ka', 'დედაშენს რა ვუთხრა?!')
        ->save();

        $quote = Quote::factory()->create([
            'user_id' => $user->id,
            'movie_id' => $movie->id,
        ]);
        $quote->setTranslation('body', 'en', 'What brought you here, you abundant little thing')
        ->setTranslation('body', 'ka', 'შენ აქ საიდან გაჩნდი, შე ბარაქიანო შენა')
        ->save();
    }
}
