<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskSubmissions extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'student_id',
        'file_path',
        'status',
        'submitted_at',
        'grade',
        'grade_at',
    ];

    public function task()
    {
        return $this->belongsTo(Tasks::class, 'task_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
