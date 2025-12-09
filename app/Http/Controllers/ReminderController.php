<?php

namespace App\Http\Controllers;
use App\Models\SubjectSchedule;
use App\Models\Task;
use Carbon\Carbon;


class ReminderController extends Controller
{
public function index()
{
return view('reminder.index');
}


public function getReminders()
{
$tomorrow = Carbon::tomorrow()->toDateString();
$today = Carbon::today()->toDateString();


return response()->json([
'besok_mapel' => SubjectSchedule::where('date', $tomorrow)->get(),
'deadline_tugas' => Task::where('deadline', $today)->get()
]);
}
}