<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index')
    ->middleware(['auth']);
Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create')
    ->middleware(['auth']);
Route::post('/posts', [PostController::class, 'store'])
    ->name('posts.store')
    ->middleware(['auth']);
Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show')
    ->middleware(['auth']);
Route::delete('/posts/{id}', [PostController::class, 'destroy'])
    ->name('posts.destroy')
    ->middleware(['auth']);

Route::get('/posts/{post}/comments/create', [CommentController::class, 'create'])
    ->name('comments.create')
    ->middleware(['auth']);
Route::post('/comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->middleware(['auth']);

require __DIR__.'/auth.php';
