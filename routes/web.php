<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PlaylistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [IndexController::class, 'index']);


Route::middleware('auth')->group(function () {

    // dashboard
    Route::get('dashboard', [DashboardController::class, 'index']);
    // Route::get('dashboard/{id}', [DashboardController::class, 'show']);

    // Genre
    Route::post('genre', [GenreController::class, 'store']); //create
    Route::get('genre', [GenreController::class, 'index']);
    Route::get('genre/create', [GenreController::class, 'create']);
    Route::get('genre/{id}/edit', [GenreController::class, 'edit']);
    Route::patch('genre/{id}', [GenreController::class, 'update']); //update
    Route::get('genre/{id}/delete', [GenreController::class, 'destroy']); //delete

    // Cinema
    Route::post('cinema', [CinemaController::class, 'store']); //create
    Route::get('cinema', [CinemaController::class, 'index']);
    Route::get('cinema/create', [CinemaController::class, 'create']);
    Route::get('cinema/{id}/edit', [CinemaController::class, 'edit']);
    Route::patch('cinema/{id}', [CinemaController::class, 'update']); //update
    Route::get('cinema/{id}/delete', [CinemaController::class, 'destroy']); //delete

    // Movie
    Route::post('movies', [MovieController::class, 'store']); //create
    Route::get('movies', [MovieController::class, 'index']);
    Route::get('movies/create', [MovieController::class, 'create']);
    Route::get('movies/{id}/edit', [MovieController::class, 'edit']);
    Route::patch('movies/{id}', [MovieController::class, 'update']); //update
    Route::get('movies/{id}/delete', [MovieController::class, 'destroy']); //delete

    // Route::resource('movies', MovieController::class);

    // Playlist
    Route::post('playlist', [PlaylistController::class, 'store']); //create
    Route::get('playlist', [PlaylistController::class, 'index']);
    Route::get('playlist/create', [PlaylistController::class, 'create']);
    Route::get('playlist/{id}/edit', [PlaylistController::class, 'edit']);
    Route::patch('playlist/{id}', [PlaylistController::class, 'update']); //update
    Route::get('playlist/{id}/delete', [PlaylistController::class, 'destroy']); //delete
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
