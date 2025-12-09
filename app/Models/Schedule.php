<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'subject', 'teacher', 'room',
        'start_time', 'end_time', 'date'
    ];
}