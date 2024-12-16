<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// //Artist view using input variables.
// Route::get('/artists/{artist?}', function($artist = null) {
//     return view('artists', ['artist'=>$artist]);
// });

//to add authentication to a rout use "->middleware(['auth'])"

Route::get('/artists', [ArtistController::class, 'index']);
Route::get('/artists/{id}', [ArtistController::class, 'show']);

Route::get('/albums', [AlbumController::class, 'index']);
Route::get('/albums/{id}', [AlbumController::class, 'show']);

require __DIR__.'/auth.php';
