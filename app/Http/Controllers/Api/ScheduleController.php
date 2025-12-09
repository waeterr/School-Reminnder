<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function getByDate(Request $request)
{
    $day = $request->day;  // <— ganti date jadi day

    $data = Schedule::where('day', $day)->get();

    return response()->json($data);
}

}