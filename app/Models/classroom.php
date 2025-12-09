<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'name',
        'subject',
        'class_code'
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function members(){
        return $this->hasMany(ClassMember::class);

    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'class_members')
            ->wherePivot('role', 'student')
            ->withTimestamps();
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'classroom_id');
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    // Methods
    public function generateClassCode()
    {
        do {
            $code = strtoupper(substr(md5(uniqid()), 0, 6));
        } while (self::where('class_code', $code)->exists());

        return $code;
    }

    public function isMember($userId)
    {
        return $this->members()
            ->where('user_id', $userId)
            ->where('status', 'active')
            ->exists();
    }

    public function getStudentCountAttribute()
    {
        return $this->members()->where('role', 'student')->where('status', 'active')->count();
    }

    public function getAssignmentCountAttribute()
    {
        return $this->assignments()->count();
    }
}
