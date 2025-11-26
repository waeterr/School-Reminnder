<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'photo',
        'gender',
        'address',
        'phone_number',
        'date_of_birth',
        'school',
        'status',
        'last_seen_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function classroomTeaching()
    {
        return $this->hasMany(classroom::class, 'teacher_id');
    }

    public function classroomJoined()
    {
        return $this->belongsToMany(classroom ::class, 'classroom_students', 'student_id', 'class_id');
    }

    public function submissions()
    {
        return $this->hasMany(taskSubmissions::class, 'student_id');

    }
        public function isActive()
    {
        return $this->status === 'active';
    }

    public function lastSeenHuman()
    {
        return $this->last_seen ? $this->last_seen->diffForHumans() : 'Never';
    }

}
