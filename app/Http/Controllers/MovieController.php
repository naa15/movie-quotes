<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movie = Movie::where('slug', request('movie'))->first();
        return view('list', [
                'quotes' => Quote::where('movie_id', $movie->id)->get(),
                'movie' => $movie,
            ]);
    }
}
