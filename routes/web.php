<?php

use Illuminate\Support\Facades\Route;
use App\Models\Quote;
use App\Models\Movie;
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
    Route::get('/', [QuoteController::class, 'getRandomQuote'])->middleware('locale')->name('index');
    Route::get('quote/{quote}', [QuoteController::class, 'index'])->middleware('locale')->name('quote');
    Route::get('movie/{movie:slug?}', [MovieController::class, 'index'])->middleware('locale')->name('movie.list');
    Route::get('login', [SessionController::class, 'create'])->middleware('guest')->name('login');
    Route::post('login', [SessionController::class, 'store'])->middleware('guest')->name('login');
    Route::get('logout', [SessionController::class, 'destroy'])->middleware('auth')->name('logout');
});


Route::group(['prefix' => 'admin/movies/', 'middleware' => ['can:admin']], function () {
    Route::get('/', [MovieController::class, 'indexAdminPanel'])->name('admin.movies');
    Route::get('create', [MovieController::class, 'create'])->name('admin.movies.create');
    Route::post('/', [MovieController::class, 'store'])->name('admin.movies');
    Route::delete('{movie}', [MovieController::class, 'destroy'])->name('admin.movies.delete');
    Route::get('{movie}/edit', [MovieController::class, 'edit'])->name('admin.movies.edit');
    Route::patch('{movie}', [MovieController::class, 'update'])->name('admin.movies.update');
});

Route::group(['prefix' => 'admin/quotes/', 'middleware' => ['can:admin']], function () {
    Route::get('/', [QuoteController::class, 'indexAdminPanel'])->name('admin.quotes');
    Route::get('create', [QuoteController::class, 'create'])->name('admin.quotes.create');
    Route::delete('{quote}', [QuoteController::class, 'destroy'])->name('admin.quotes.delete');
    Route::post('/', [QuoteController::class, 'store'])->name('admin.quotes');
    Route::get('{quote}/edit', [QuoteController::class, 'edit'])->name('admin.quotes.edit');
    Route::patch('{quote}', [QuoteController::class, 'update'])->name('admin.quotes.update');
});
