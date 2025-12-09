<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
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

// Public guest view (no auth required)
Route::get('/homestudent-guest', function () {
    return view('homestudent');
})->name('homestudent.guest');

Route::get('/log2', function () {
    return view('login2');
})->name('log2');

// Public pages (accessible without login)
Route::get('/calendar', function () {
    return view('onboard');
})->name('calendar');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/about-uslog', function () {
    return view('about-uslog');
})->name('about-uslog');

Route::get('/Reminder', function () {
    return view('Reminder');
})->name('Reminder');

// Protected Routes - User must be logged in
Route::middleware(['auth', 'verified'])->group(function () {
    // Protected homestudent for logged-in users
    Route::get('/homestudent', function () {
        return view('homestudent');
    })->name('homestudent');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Task routes - role-based
    Route::get('/task', [TaskController::class, 'studentTasks'])->name('task');
    Route::get('/home-teacher', [TaskController::class, 'teacherHome'])->name('home-teacher');
    Route::get('/task-teacher', [TaskController::class, 'teacherTasks'])->name('task.teacher');

    // Profile routes
    Route::get('/profile', function () {
        return view('profile.profile');
    })->name('profile');
    
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
