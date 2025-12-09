<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
    'last_seen_at',
    'status',
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



    protected $appends = ['profile_picture_url'];

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
        'date_of_birth' => 'date',
        'last_seen_at' => 'datetime',
    ];
}


    // Relationships
    /**
     * Classrooms where this user is the teacher.
     */
    public function classroomsAsTeacher(): HasMany
    {
        return $this->hasMany(Classroom::class, 'teacher_id');
    }

    public function classMemberships()
    {
        return $this->hasMany(ClassMember::class);
    }

    /**
     * Classrooms this user is enrolled in (via class_members pivot).
     * Adjust pivot name/columns if your schema differs.
     */
    public function enrolledClassrooms(): BelongsToMany
    {
        return $this->belongsToMany(
            Classroom::class,
            'class_members',     // pivot table
            'user_id',           // FK on pivot pointing to this model
            'classroom_id'       // FK on pivot pointing to Classroom
        )
        ->withPivot('role', 'status', 'joined_at')
        ->wherePivot('status', 'active');
    }

    public function taskCreated()
    {
        return $this->hasMany(Assignment::class, 'created_by');
    }

    public function taskSubmissions()
    {
        return $this->hasMany(Submission::class, 'student_id');
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class, 'created_by');
    }

    public function materials()
    {
        return $this->hasMany(Material::class, 'created_by');
    }


    // Scopes
    public function scopeTeachers($query)
    {
        return $query->where('role', 'teacher');
    }

    public function scopeStudents($query)
    {
        return $query->where('role', 'student');
    }

    public function scopeAdmins($query)
    {
        return $query->where('role', 'admin');
    }

    // Helper Methods
    /**
     * Simple helper to check teacher role.
     * Adjust to your role system (role column, permissions, etc.).
     */
    public function isTeacher(): bool
    {
        if (array_key_exists('role', $this->attributes)) {
            return $this->role === 'teacher';
        }

        // Fallback: consider user a teacher if they own any classrooms
        return $this->classroomsAsTeacher()->exists();
    }

    /**
     * Return true when this user is a student.
     * Adjust to your app's role system (role field, relation, permissions).
     */
    public function isStudent(): bool
    {
        // If you have a 'role' attribute:
        if (array_key_exists('role', $this->attributes)) {
            return $this->role === 'student';
        }

        // Fallback: you can also check a roles relation or permission gate here
        return false;
    }

    public function isAdmin()
    {
        return $this->role === 'admin' || $this->type === 'admin';
    }

    public function getInitialsAttribute()
    {
        $names = explode(' ', $this->name);
        $initials = '';
        
        foreach ($names as $name) {
            $initials .= strtoupper(substr($name, 0, 1));
        }
        
        return substr($initials, 0, 2);
    }

    public function getProfilePictureUrlAttribute()
    {
        if ($this->profile_picture) {
            return asset('storage/profile_pictures/' . $this->profile_picture);
        }
        
        // Generate avatar dengan inisial
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=FFFFFF&background=4F46E5';
    }
}