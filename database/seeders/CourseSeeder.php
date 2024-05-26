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
        
    }
}
