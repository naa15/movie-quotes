<?php

use Illuminate\Support\Facades\Route;
use App\Models\Quote;
use App\Models\Movie;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'quote' => Quote::inRandomOrder()->first()
    ]);
});

Route::get('movies/{movie:slug}', function (Movie $movie) {
    return view('list', [
        'quotes' => Quote::where('movie_id', $movie->id)->get(),
        'movie' => $movie
    ]);
});
