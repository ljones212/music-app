<?php

use App\Http\Controllers\ArtistController;
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

// //Route with no authentication
// Route::get('/songs', function() {
//     return "Welcome to the songs page.";
// });

// //Route with authentication
// Route::get('/artist', function() {
//     return "Artist page.";
// })->middleware(['auth']);

// //Artist view using input variables.
// Route::get('/artists/{artist?}', function($artist = null) {
//     return view('artists', ['artist'=>$artist]);
// });

Route::get('/artists', [ArtistController::class, 'index']);

require __DIR__.'/auth.php';
