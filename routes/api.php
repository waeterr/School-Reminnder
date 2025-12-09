<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\TaskController;


// -----------------------------------------------------
// 1. GET DAILY SCHEDULE
// URL: /api/schedule?date=2025-07-01
// -----------------------------------------------------
Route::get('/schedule', [ScheduleController::class, 'getByDate']);


// -----------------------------------------------------
// 2. GET TASKS BY DATE
// URL: /api/tasks?date=2025-07-01
// -----------------------------------------------------
Route::get('/tasks', [TaskController::class, 'getByDate']);


// -----------------------------------------------------
// 3. GET TASK DETAIL
// URL: /api/task/1
// -----------------------------------------------------
Route::get('/task/{id}', [TaskController::class, 'getDetail']);
