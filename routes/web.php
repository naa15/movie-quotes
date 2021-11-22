<?php

use Illuminate\Support\Facades\Route;
use App\Models\Quote;
use App\Models\Movie;
use App\Models\User;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\MovieController;

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
Route::group(array('prefix' => '{pathlang?}'), function () {
    Route::get('/', function () {
        return view('home', [
        'quote' => Quote::inRandomOrder()->first()
    ]);
    })->middleware('locale');

    Route::get('movie/{movie:slug?}', [MovieController::class, 'index'])->middleware('locale');

    Route::get('login', [SessionController::class, 'create'])->middleware('guest');
    Route::post('login', [SessionController::class, 'store'])->middleware('guest');
    Route::get('logout', [SessionController::class, 'destroy'])->middleware('auth');
});


Route::group(array('prefix' => 'admin'), function () {
    Route::get('/movies', function () {
        return view('admin/movies', [
            'movies' => Movie::latest()->get()
        ]);
    })->middleware('can:admin');

    Route::get('/quotes', function () {
        return view('admin/quotes', [
            'quotes' => Quote::latest()->get()
        ]);
    })->middleware('can:admin');
});




Route::get('admin/movies/create', [MovieController::class, 'create'])->middleware('can:admin');
Route::post('admin/movies', [MovieController::class, 'store'])->middleware('can:admin');
Route::delete('admin/movies/{movie}', [MovieController::class, 'destroy'])->middleware('can:admin');
Route::get('admin/movies/{movie}/edit', [MovieController::class, 'edit'])->middleware('can:admin');
Route::patch('admin/movies/{movie}', [MovieController::class, 'update'])->middleware('can:admin');

Route::get('admin/quotes/create', [QuoteController::class, 'create'])->middleware('can:admin');
Route::delete('admin/quotes/{quote}', [QuoteController::class, 'destroy'])->middleware('can:admin');
Route::post('admin/quotes', [QuoteController::class, 'store'])->middleware('can:admin');
Route::get('admin/quotes/{quote}/edit', [QuoteController::class, 'edit'])->middleware('can:admin');
Route::patch('admin/quotes/{quote}', [QuoteController::class, 'update'])->middleware('can:admin');
