<?php

use Modules\Blog\Controllers\ProductController;
use Modules\Blog\Controllers\ProfileController;
use Modules\Blog\Controllers\RuleController;
use Illuminate\Support\Facades\Route;

Route::get('/test-rule', [RuleController::class, 'testRule']);

// Route::get('/products', [ProductController::class, 'index'])->middleware('auth');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/public', [ProductController::class, 'home']);
Route::resource('/products', ProductController::class);

Route::get('/dashboard', function () {
    return view('Blog::dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';