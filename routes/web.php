<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\Post;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts', function () {
    return Inertia::render('Posts', [
        'posts' => Post::with(['user', 'comments'])->get()
    ]);
})->name('posts');
//Route::middleware('auth')->group(function () {
//    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
//    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
//    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
//    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
//    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
//    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
//    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
//    Route::post('/posts/{id}/comments', [CommentController::class, 'store'])->middleware('auth')->name('comments.store');
//    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->middleware('auth')->name('comments.destroy');
//});

Route::post('/posts/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->middleware('auth')->name('comments.destroy');

require __DIR__.'/auth.php';
