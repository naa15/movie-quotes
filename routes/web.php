<?php

use Illuminate\Support\Facades\Route;
use App\Models\Quote;
use App\Models\Movie;
use App\Models\User;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuoteController;

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
        'quotes' => Quote::latest()->get()
    ]);
})->middleware('auth');

Route::get('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('admin/movies/create', [AdminController::class, 'create'])->middleware('auth');
Route::post('admin/movies', [AdminController::class, 'store'])->middleware('auth');
Route::delete('admin/movies/{movie}', [AdminController::class, 'destroy'])->middleware('auth');
Route::get('admin/movies/{movie}/edit', [AdminController::class, 'edit'])->middleware('auth');
Route::patch('admin/movies/{movie}', [AdminController::class, 'update'])->middleware('auth');

Route::get('admin/quotes/create', [QuoteController::class, 'create'])->middleware('auth');
Route::delete('admin/quotes/{quote}', [QuoteController::class, 'destroy'])->middleware('auth');
Route::post('admin/quotes', [QuoteController::class, 'store'])->middleware('auth');
Route::get('admin/quotes/{quote}/edit', [QuoteController::class, 'edit'])->middleware('auth');
Route::patch('admin/quotes/{quote}', [QuoteController::class, 'update'])->middleware('auth');
