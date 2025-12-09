<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\Assignment;

class TaskController extends Controller
{
    /**
     * Show student tasks (student view)
     */
    public function studentTasks()
    {
        $user = Auth::user();
        
        // Get classrooms the student is enrolled in
        $classrooms = Classroom::whereHas('members', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        // Get all assignments from those classrooms
        $assignments = Assignment::whereIn('classroom_id', $classrooms->pluck('id'))->get();

        return view('task', compact('assignments', 'classrooms'));
    }

    /**
     * Show teacher's classrooms and tasks
     */
    public function teacherTasks()
    {
        $user = Auth::user();
        
        // Get classrooms owned by the teacher
        $classrooms = Classroom::where('teacher_id', $user->id)->get();

        // Get all assignments from those classrooms
        $assignments = Assignment::whereIn('classroom_id', $classrooms->pluck('id'))->get();

        return view('task-teacher', compact('assignments', 'classrooms'));
    }

    /**
     * Show teacher dashboard with classrooms
     */
    public function teacherHome()
    {
        $user = Auth::user();
        
        // Get classrooms owned by the teacher
        $classrooms = Classroom::where('teacher_id', $user->id)->get();

        return view('home-teacher', compact('classrooms'));
    }
}
