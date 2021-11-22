<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
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
