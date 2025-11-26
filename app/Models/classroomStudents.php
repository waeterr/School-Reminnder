<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class classroomStudents extends Model
{
    protected $table = 'classroom_students';

    protected $fillable = [
        'classroom_id',
        'student_id',
    ];
}
