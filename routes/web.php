<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('onboard');
})->name('home');

Route::get('/onboard', function () {
    return view('onboard');
})->name('onboard');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');


Route::get('/homestudent-guest', function () {
    return view('homestudent');
})->name('homestudent.guest');

Route::get('/log2', function () {
    return view('login2');
})->name('log2');
// homestudent for logged-in users will be defined inside the protected group
// Protected Routes - User harus sudah login
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

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');
route::get('/about-uslog', function () {
    return view('about-uslog');
})->name('about-uslog');

route::get('/home-teacher', function () {
    return view('home-teacher');
})->name('home-teacher');

route::get('/task-teacher', function () {
    return view('task-teacher');
})->name('task.teacher');

route::get('/profile', function () {
    return view('profile');
})->name('profile');
// Protected Routes - User must be logged in
Route::middleware(['auth', 'verified'])->group(function () {
    // Protected homestudent for logged-in users
    // Use the same `homestudent` view for both guest and authenticated users
    Route::get('/homestudent', function () {
        return view('homestudent');
    })->name('homestudent');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Profile routes
    Route::get('/profile', function () {
        return view('profile.profile');
    })->name('profile');
});
require __DIR__.'/auth.php';
