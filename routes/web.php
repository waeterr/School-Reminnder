<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Routes - Onboarding Flow
Route::get('/', function () {
    return view('onboard');
})->name('home');

Route::get('/onboard', function () {
    return view('onboard');
})->name('onboard');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/homestudent', function () {
    return view('homestudent');
})->name('homestudent');

// Protected Routes - User harus sudah login
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/calendar', function () {
        return view('welcome');
    })->name('calendar');

    Route::get('/task', function () {
        return view('task');
    })->name('task');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
