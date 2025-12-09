<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReminderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\TaskController;

Route::get('/schedule', [ScheduleController::class, 'getByDate']);
Route::get('/tasks', [TaskController::class, 'getByDate']);
Route::get('/task/{id}', [TaskController::class, 'getDetail']);


Route::get('/calendar', [CalendarController::class, 'index']);
Route::get('/calendar/events', [CalendarController::class, 'getEvents']);


Route::get('/reminder', [ReminderController::class, 'index']);
Route::get('/reminder/data', [ReminderController::class, 'getReminders']);

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

// Public guest view (optional)
Route::get('/homestudent-guest', function () {
    return view('homestudent');
})->name('homestudent.guest');

Route::get('/log2', function () {
    return view('login2');
});

// Public pages (accessible without login)
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/calendar', function () {
    return view('welcome');
})->name('calendar');

Route::get('/task', function () {
    return view('task');
})->name('task');

Route::get('/reminder', function () {
    return view('reminder-student');
})->name('reminder');

// Protected Routes - User harus sudah login
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/homestudent', function () {
        return view('homestudentlog');
    })->name('homestudent');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Reminder filter route
Route::get('/reminder/by/{subject}', [ReminderController::class, 'filterBySubject']);


// ==========================
// ⭐ API ROUTE BARU UNTUK SCHEDULE
// ==========================
Route::get('/api/schedule', function () {
    $date = request('date');
    $day = strtolower(\Carbon\Carbon::parse($date)->format('l'));

    return \App\Models\Schedule::where('day', $day)
        ->orderBy('start_time')
        ->get();
});

require __DIR__.'/auth.php';