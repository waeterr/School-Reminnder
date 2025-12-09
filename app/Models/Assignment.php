<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'title',
        'description',
        'created_by',
        'attachments',
        'due_date'
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'attachments' => 'array'
    ];

    
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function taskSubmissions()
    {
        return $this->hasMany(Submission::class);
    }

    // Alias for convenience
    public function submissions()
    {
        return $this->taskSubmissions();
    }

    public function isPastDue()
    {
        return now()->greaterThan($this->due_date);
    }

    public function getGradedCountAttribute()
    {
        return $this->taskSubmissions()->where('status', 'graded')->count();
    }
}