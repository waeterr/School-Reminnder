<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\AssignmentController;
use App\Http\Controllers\Api\SubmissionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Protected routes
Route::middleware(['auth:sanctum'])->group(function () {
    // Auth
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    
    // Profile
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show']);
        Route::put('/', [ProfileController::class, 'update']);
        Route::put('/student-id', [ProfileController::class, 'updateStudentId']);
    });

    // Classroom routes
    Route::prefix('classrooms')->group(function () {
        Route::get('/', [ClassroomController::class, 'index']);
        Route::get('/my', [ClassroomController::class, 'myClassrooms']);
        Route::post('/', [ClassroomController::class, 'store']);
        Route::post('/join', [ClassroomController::class, 'join']);
        
        Route::prefix('{classroom}')->group(function () {
            Route::get('/', [ClassroomController::class, 'show']);
            Route::put('/', [ClassroomController::class, 'update']);
            Route::delete('/', [ClassroomController::class, 'destroy']);
            
            // Members
            Route::get('/members', [ClassroomController::class, 'members']);
            Route::delete('/members/{member}', [ClassroomController::class, 'removeMember']);
            
            // Assignments
            Route::prefix('assignments')->group(function () {
                Route::get('/', [AssignmentController::class, 'index']);
                Route::post('/', [AssignmentController::class, 'store']);
                
                Route::prefix('{assignment}')->group(function () {
                    Route::get('/', [AssignmentController::class, 'show']);
                    Route::put('/', [AssignmentController::class, 'update']);
                    Route::delete('/', [AssignmentController::class, 'destroy']);
                    
                    // Submissions for teacher
                    Route::get('/submissions', [AssignmentController::class, 'submissions']);
                    
                    // Student submissions
                    Route::prefix('submissions')->group(function () {
                        Route::get('/my', [SubmissionController::class, 'mySubmissions']);
                        Route::post('/', [SubmissionController::class, 'store']);
                        Route::post('/submit', [SubmissionController::class, 'submit']);
                        
                        Route::prefix('{submission}')->group(function () {
                            Route::post('/grade', [SubmissionController::class, 'grade']);
                        });
                    });
                });
            });
            
            // Future routes for announcements, materials, attendance, etc.
            // Route::apiResource('announcements', AnnouncementController::class);
            // Route::apiResource('materials', MaterialController::class);
            // Route::apiResource('attendances', AttendanceController::class);
        });
    });
});