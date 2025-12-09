<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getByDate(Request $request)
    {
        $date = $request->date;

        $tasks = Task::where('deadline', $date)->get();

        return response()->json($tasks);
    }

    public function getDetail($id)
    {
        return response()->json(Task::find($id));
    }
}