<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DvdController;
use App\Http\Controllers\DvdFormatController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TypeController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes for DVD characteristics
Route::resource('dvdformats', DvdFormatController::class);

Route::resource('types', TypeController::class);

Route::resource('genres', GenreController::class);

Route::resource('locations', LocationController::class);

// Route for DVD's
Route::resource('dvds', DvdController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';