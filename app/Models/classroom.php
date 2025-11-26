<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class classroom extends Model
{
    use HasFactory;

    protected $table = 'classroom';

    protected $fillable = [
        'teacher_id',
        'name',
        'subject',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'classroom_students', 'class_id', 'student_id');
    }


    public function tasks()
    {
        return $this->hasMany(tasks::class, 'class_id');
    }
}