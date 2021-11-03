<?php

use Illuminate\Support\Facades\Route;
use App\Models\Quote;
use App\Models\Movie;
use App\Models\User;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;

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

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::get('admin/movies', function () {
    return view('admin/movies', [
        'movies' => Movie::latest()->get()
    ]);
})->middleware('auth');

Route::get('admin/quotes', function () {
    return view('admin/quotes', [
        'quotes' => Quote::all()
    ]);
})->middleware('auth');

Route::get('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('admin/movies/create', [AdminController::class, 'create'])->middleware('auth');
Route::post('admin/movies', [AdminController::class, 'store'])->middleware('auth');
