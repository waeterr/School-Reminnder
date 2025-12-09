<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'classroom_id',
        'created_by',
        'attachments',
        'pinned',
        'publish_at'
    ];

    protected $casts = [
        'attachments' => 'array',
        'pinned' => 'boolean',
        'publish_at' => 'datetime'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}