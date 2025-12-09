<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SubjectSchedule;
use App\Models\Task;
use App\Models\Exam;
use Carbon\Carbon;


class CalendarController extends Controller
{
public function index()
{
return view('calendar.index');
}


public function getEvents()
{
$events = [];


$schedules = SubjectSchedule::all();
foreach ($schedules as $sch) {
$events[] = [
'title' => $sch->subject_name,
'start' => Carbon::parse($sch->date)->toDateString(),
'color' => '#2c7be5'
];
}


$tasks = Task::all();
foreach ($tasks as $task) {
$events[] = [
'title' => 'Tugas: ' . $task->title,
'start' => Carbon::parse($task->deadline)->toDateString(),
'color' => '#f5365c'
];
}


$exams = Exam::all();
foreach ($exams as $exam) {
$events[] = [
'title' => 'Ujian: ' . $exam->title,
'start' => Carbon::parse($exam->date)->toDateString(),
'color' => '#fb6340'
];
}


return response()->json($events);
}
}