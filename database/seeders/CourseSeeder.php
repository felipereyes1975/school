<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$day1 = new Days;
        // $day1->desc = 'Monday';'desc',
        // 'semester',
        // 'Teacher_id',
        // 'Matter_id',
        // 'Classroom_id',
        // 'created_by',
        // 'updated_by'
        // $day1->created_by = 1;
        // $day1->save();
        $course1 = new Course();
        $course1->desc = 'Programming 1A';
        $course1->semester = 1;
        $course1->Teacher_id = 1;
        $course1->Matter_id = 1;
        $course1->Classroom_id = 1;
        $course1->created_by = 1;
        $course1->save();

        $course2 = new Course();
        $course2->desc = 'Database 1A';
        $course2->semester = 1;
        $course2->Teacher_id = 2;
        $course2->Matter_id = 2;
        $course2->Classroom_id = 2;
        $course2->created_by = 1;
        $course2->save();
        
        $course3 = new Course();
        $course3->desc = 'Networks 1A';
        $course3->semester = 1;
        $course3->Teacher_id = 3;
        $course3->Matter_id = 3;
        $course3->Classroom_id = 3;
        $course3->created_by = 1;
        $course3->save();

        $course4 = new Course();
        $course4->desc = 'Chemistry 1A';
        $course4->semester = 1;
        $course4->Teacher_id = 4;
        $course4->Matter_id = 4;
        $course4->Classroom_id = 4;
        $course4->created_by = 1;
        $course4->save();

        //la que sigue compadre la que sigueeeeeeeeee eaaaa
        $course5 = new Course();
        $course5->desc = 'Programming 2A';
        $course5->semester = 2;
        $course5->Teacher_id = 1;
        $course5->Matter_id = 5;
        $course5->Classroom_id = 1;
        $course5->created_by = 1;
        $course5->save();

        $course6 = new Course();
        $course6->desc = 'Math 1A';
        $course6->semester = 1;
        $course6->Teacher_id = 8;
        $course6->Matter_id = 8;
        $course6->Classroom_id = 5;
        $course6->created_by = 7;
        $course6->save();
        
        $course7 = new Course();
        $course7->desc = 'Networks 1B';
        $course7->semester = 1;
        $course7->Teacher_id = 3;
        $course7->Matter_id = 3;
        $course7->Classroom_id = 4;
        $course7->created_by = 1;
        $course7->save();

        $course8 = new Course();
        $course8->desc = 'Chemistry 2B';
        $course8->semester = 2;
        $course8->Teacher_id = 7;
        $course8->Matter_id = 6;
        $course8->Classroom_id = 9;
        $course8->created_by = 4;
        $course8->save();
    }
}
