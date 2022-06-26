<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\School;
use App\Models\Subject;
use App\Models\SubjectTeacher;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $schoolId = School::factory(['name' => 'Class of Informatika'])->create()->id;

        $users = [
            [
                'name' => 'adminuser',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'role' => User::ADMIN,
                'status' => true,
                'semester' => 8,
                'school_id' => $schoolId,
            ],
            [
                'name' => 'teacheruser',
                'username' => 'teacher',
                'password' => Hash::make('teacher'),
                'role' => User::TEACHER,
                'status' => true,
                'semester' => 8,
                'school_id' => $schoolId,
            ],
            [
                'name' => 'studentuser',
                'username' => 'student',
                'password' => Hash::make('student'),
                'role' => User::STUDENT,
                'status' => true,
                'semester' => 8,
                'school_id' => $schoolId,
            ],
        ];

        $selectedTeacherId = '';
        foreach ($users as $user) {
            $createdUser = User::factory($user)->create();

            if ($createdUser->role === 'TEACHER') {
                $selectedTeacherId = $createdUser->id;
            }

            if ($createdUser->role === 'STUDENT') {
                DB::table('experiences')->insert([
                    'id' => Uuid::uuid4()->toString(),
                    'school_id' => $schoolId,
                    'semester' => 8,
                    'user_id' => $createdUser->id,
                    'experience_point' => 0,
                    'level' => 0,
                ]);
            }
        }

        $subjects = [
            [
                'name' => 'Pemograman Berbasis Oriented',
                'school_id' => $schoolId,
            ],
            [
                'name' => 'Matematika Disktrit',
                'school_id' => $schoolId,
            ],
            [
                'name' => 'RPL DI',
                'school_id' => $schoolId,
            ],
        ];

        $subjectIds = [];
        foreach ($subjects as $subject) {
            $createdSubject = Subject::factory($subject)->create();
            $subjectIds[] = $createdSubject->id;

            SubjectTeacher::factory(['subject_id' => $createdSubject->id, 'teachers' => [$selectedTeacherId]])->create();
        }

        $courseDescription = collect([
            'IT',
            'Umum',
        ]);

        $courseIds = [];
        foreach ($subjectIds as $subjectId) {
            $course = [
                'description' => $courseDescription->random(),
                'semester' => 8,
                'created_by' => $selectedTeacherId,
                'subject_id' => $subjectId,
            ];

            $courseIds[] = Course::factory($course)->create()->id;
        }

        foreach ($subjectIds as $subjectId) {
            $course = [
                'description' => $courseDescription->random(),
                'semester' => 7,
                'created_by' => $selectedTeacherId,
                'subject_id' => $subjectId,
            ];

            $courseIds[] = Course::factory($course)->create()->id;
        }

        foreach ($subjectIds as $subjectId) {
            foreach ($courseIds as $courseId) {
                for ($i = 0; $i < 3; $i++) {
                    Topic::factory(['course_id' => $courseId, 'subject_id' => $subjectId])->create();
                }
            }
        }
    }
}
