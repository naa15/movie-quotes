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
    Route::get('/', [QuoteController::class, 'getRandomQuote'])->middleware('locale');
    Route::get('quote/{quote}', [QuoteController::class, 'index'])->middleware('locale');
    Route::get('movie/{movie:slug?}', [MovieController::class, 'index'])->middleware('locale');
    Route::get('login', [SessionController::class, 'create'])->middleware('guest');
    Route::post('login', [SessionController::class, 'store'])->middleware('guest');
    Route::get('logout', [SessionController::class, 'destroy'])->middleware('auth');
});


Route::group(['prefix' => 'admin/movies/', 'middleware' => ['can:admin']], function () {
    Route::get('/', [MovieController::class, 'indexAdminPanel']);
    Route::get('create', [MovieController::class, 'create']);
    Route::post('/', [MovieController::class, 'store']);
    Route::delete('{movie}', [MovieController::class, 'destroy']);
    Route::get('{movie}/edit', [MovieController::class, 'edit']);
    Route::patch('{movie}', [MovieController::class, 'update']);
});

Route::group(['prefix' => 'admin/quotes/', 'middleware' => ['can:admin']], function () {
    Route::get('/', [QuoteController::class, 'indexAdminPanel']);
    Route::get('create', [QuoteController::class, 'create']);
    Route::delete('{quote}', [QuoteController::class, 'destroy']);
    Route::post('/', [QuoteController::class, 'store']);
    Route::get('{quote}/edit', [QuoteController::class, 'edit']);
    Route::patch('{quote}', [QuoteController::class, 'update']);
});
