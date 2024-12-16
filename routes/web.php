<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PostController;
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

//to add authentication to a rout use "->middleware(['auth'])"

Route::get('/artists', [ArtistController::class, 'index']);
Route::get('/artists/{id}', [ArtistController::class, 'show'])
    ->name('artists.show');

Route::get('/albums', [AlbumController::class, 'index'])
    ->name('albums.index');
Route::get('/albums/create', [AlbumController::class, 'create'])
    ->name('albums.create');
Route::post('/albums', [AlbumController::class, 'store'])
    ->name('albums.store');
Route::get('/albums/{id}', [AlbumController::class, 'show'])
    ->name('albums.show');
Route::delete('/albums/{id}', [AlbumController::class, 'destroy'])
    ->name('albums.destroy');

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index')
    ->middleware(['auth']);
Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create')
    ->middleware(['auth']);
Route::post('/posts', [PostController::class, 'store'])
    ->name('posts.store')
    ->middleware(['auth']);
Route::get('/posts/{id}', [PostController::class, 'show'])
    ->name('posts.show')
    ->middleware(['auth']);
Route::delete('/posts/{id}', [PostController::class, 'destroy'])
    ->name('posts.destroy')
    ->middleware(['auth']);

require __DIR__.'/auth.php';
