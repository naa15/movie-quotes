<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Movie;
use Illuminate\Validation\Rule;

class QuoteController extends Controller
{
    public function index(string $pathlang, Quote $quote)
    {
        return view('home', [
            'quote' => $quote,
        ]);
    }

    public function indexAdminPanel()
    {
        return view('admin/quotes', [
            'quotes' => Quote::latest()->get()
        ]);
    }

    public function getRandomQuote()
    {
        $quote = Quote::inRandomOrder()->first();
        return redirect('/' . app()->currentLocale() . '/quote/' . $quote->id);
    }

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
            'english_body' => 'required|max:255',
            'georgian_body' => 'required|max:255',
            'thumbnail' => 'image|required'
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        $quote = new Quote([
            'user_id' => auth()->id(),
            'thumbnail' => $attributes['thumbnail'],
            'movie_id' => $attributes['movie_id'],
        ]);

        $quote
            ->setTranslation('body', 'en', $attributes['english_body'])
            ->setTranslation('body', 'ka', $attributes['georgian_body'])
            ->save();

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
            'english_body' => 'required|max:255',
            'georgian_body' => 'required|max:255',
            'thumbnail' => 'image'
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $quote->update([
            'movie_id' => $attributes['movie_id'],
            'thumbnail' => isset($attributes['thumbnail']) ? $attributes['thumbnail'] : $quote->thumbnail
        ]);

        $quote
            ->setTranslation('body', 'en', $attributes['english_body'])
            ->setTranslation('body', 'ka', $attributes['georgian_body'])
            ->save();

        return back()->with('success', 'Quote updated');
    }
}
