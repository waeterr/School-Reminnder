<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'title',
        'description',
        'deadline',
    ];

    public function classRoom()
    {
        return $this->belongsTo(classroom::class, 'class_id');
    }

    public function submissions()
    {
        return $this->hasMany(taskSubmissions::class, 'task_id');
    }
}
