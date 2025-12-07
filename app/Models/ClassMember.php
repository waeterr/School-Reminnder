<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'student_id',
        'role',
        'joined_at'
    ];

    protected $casts = [
        'joined_at' => 'datetime'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}