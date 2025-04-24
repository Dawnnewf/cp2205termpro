<?php

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
