<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'homepage'])->name('home');
Route::get('/admin/home', [HomeController::class, 'adminhome'])->name('admin.home')->middleware(['auth', 'admin']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Admin section routes
Route::get('/admin/post/index', [AdminController::class, 'index'])->name('post.index');
Route::post('/admin/post/add', [AdminController::class, 'store'])->name('post.add');
Route::get('/admin/post/show', [AdminController::class, 'show'])->name('post.show');
Route::get('/admin/post/delete/{id}', [AdminController::class, 'delete'])->name('post.delete');
Route::get('/admin/post/edit/{id}', [AdminController::class, 'edit'])->name('post.edit');
Route::post('/admin/post/update/{id}', [AdminController::class, 'update'])->name('post.update');
