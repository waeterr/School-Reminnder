<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'student_id',
        'attachments',
        'status',
        'submitted_at',
        'grade',
        'grade_at',
    ];

    protected $casts = [
        'attachments' => 'array',
        'submitted_at' => 'datetime',
        'grade_at' => 'datetime'
    ];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function grader()
    {
        return $this->belongsTo(User::class, 'graded_by');
    }

    public function submit()
    {
        $status = $this->assignment->isPastDue() ? 'late' : 'done';
        
        $this->update([
            'status' => $status,
            'submitted_at' => now()
        ]);
    }

    public function grade($grade, $feedback, $graderId)
    {
        $this->update([
            'grade' => $grade,
            'graded_by' => $graderId,
            'graded_at' => now(),
            'status' => 'graded'
        ]);
    }

    public function isLate()
    {
        return $this->status === 'late';
    }

    public function isGraded()
    {
        return $this->status === 'graded';
    }
}