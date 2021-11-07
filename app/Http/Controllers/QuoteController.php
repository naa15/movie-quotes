<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuoteController extends Controller
{
    public function create()
    {
        return view('admin.create-quote', [
            'movies' => Movie::all()
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'movie_id' => ['required', Rule::exists('movies', 'id')],
            'body' => 'required|max:255',
            'thumbnail' => 'image|required'
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Quote::create($attributes);

        return redirect('/admin/quotes')->with('success', 'New quote added');
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();

        return back()->with('success', "Quote has been deleted");
    }

    public function edit(Quote $quote)
    {
        return view('admin.edit-quote', [
            'quote' => $quote,
            'movies' => Movie::all()
        ]);
    }

    public function update(Quote $quote)
    {
        $attributes = request()->validate([
            'movie_id' => ['required', Rule::exists('movies', 'id')],
            'body' => 'required|max:255',
            'thumbnail' => 'required|image'
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $quote->update($attributes);

        return back()->with('success', 'Quote updated');
    }
}
