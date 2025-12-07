<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Classroom;
use App\Models\ClassMember;
use App\Models\Assignment;
use App\Models\Announcement;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@classroom.test',
            'role' => 'admin',
            'password' => bcrypt('admin123'),
        ]);

        // Create teachers
        $teachers = User::factory(3)->teacher()->create([
            'password' => bcrypt('teacher123'),
        ]);

        // Create students
        $students = User::factory(20)->student()->create([
            'password' => bcrypt('student123'),
        ]);

        // Create classrooms for each teacher
        foreach ($teachers as $teacher) {
            $classrooms = Classroom::factory(2)->create([
                'teacher_id' => $teacher->id,
            ]);

            foreach ($classrooms as $classroom) {
                // Add teacher as member
                ClassMember::create([
                    'classroom_id' => $classroom->id,
                    'user_id' => $teacher->id,
                    'role' => 'teacher',
                ]);

                // Add random students to classroom
                $classStudents = $students->random(rand(8, 15));
                foreach ($classStudents as $student) {
                    ClassMember::create([
                        'classroom_id' => $classroom->id,
                        'user_id' => $student->id,
                        'role' => 'student',
                    ]);
                }

                // Create Tasks
                Assignment::factory(3)->create([
                    'classroom_id' => $classroom->id,
                    'created_by' => $teacher->id,
                ]);

                // Create announcements
                Announcement::factory(2)->create([
                    'classroom_id' => $classroom->id,
                    'created_by' => $teacher->id,
                ]);
            }
        }
    }
}
