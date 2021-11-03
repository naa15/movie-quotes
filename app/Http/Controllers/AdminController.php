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
            'title' => 'required',
            'slug' => ['required', Rule::unique('movies', 'slug')]
        ]);

        $attributes['user_id'] = auth()->id();

        Movie::create($attributes);

        return back()->with('success', "Movie has been added");
    }
}
