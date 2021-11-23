<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Validation\Rule;

class MovieController extends Controller
{
    public function index()
    {
        $movie = Movie::where('slug', request('movie'))->first();
        return view('list', ['quotes' => Quote::where('movie_id', $movie->id)->get(), 'movie' => $movie]);
    }

    public function indexAdminPanel()
    {
        return view('admin/movies', [
            'movies' => Movie::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.create-movie');
    }

    public function store()
    {
        $attributes = request()->validate([
            'english_title' => 'required',
            'georgian_title' => 'required',
            'slug' => ['required', Rule::unique('movies', 'slug')]
        ]);

        $movie = new Movie([
            'user_id' => auth()->id(),
            'slug' => $attributes['slug']
        ]);

        $movie
            ->setTranslation('title', 'en', $attributes['english_title'])
            ->setTranslation('title', 'ka', $attributes['georgian_title'])
            ->save();
        
        return redirect('/admin/movies')->with('success', "Movie has been added");
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return back()->with('success', "Movie has been deleted");
    }

    public function edit(Movie $movie)
    {
        return view('admin.edit-movie', ['movie' => $movie]);
    }

    public function update(Movie $movie)
    {
        $attributes = request()->validate([
            'english_title' => 'required',
            'georgian_title' => 'required',
            'slug' => ['required', Rule::unique('movies', 'slug')->ignore($movie)]
        ]);

        $movie->update([
            'slug' => $attributes['slug'],
        ]);
        $movie->setTranslation('title', 'en', $attributes['english_title'])
            ->setTranslation('title', 'ka', $attributes['georgian_title'])
            ->save();

        return back()->with('success', 'Movie updated');
    }
}
