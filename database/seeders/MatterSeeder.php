<?php

namespace Database\Seeders;

use App\Models\Matter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $matter1 = new Matter;
        $matter1->desc = "Programming 1";
        $matter1->semester = 1;
        $matter1->hoursPerWeek = 5;
        $matter1->created_by = 1;
        $matter1->save();

        $matter2 = new Matter;
        $matter2->desc = "Database 1";
        $matter2->semester = 1;
        $matter2->hoursPerWeek = 5;
        $matter2->created_by = 1;
        $matter2->save();

        $matter3 = new Matter;
        $matter3->desc = "Networks 1";
        $matter3->semester = 1;
        $matter3->hoursPerWeek = 5;
        $matter3->created_by = 1;
        $matter3->save();

        $matter4 = new Matter;
        $matter4->desc = "Chemistry 1";
        $matter4->semester = 1;
        $matter4->hoursPerWeek = 5;
        $matter4->created_by = 1;
        $matter4->save();

        $matter5 = new Matter;
        $matter5->desc = "Programming 2";
        $matter5->semester = 2;
        $matter5->hoursPerWeek = 5;
        $matter5->created_by = 1;
        $matter5->save();

        $matter6 = new Matter;
        $matter6->desc = "Chemistry 2";
        $matter6->semester = 2;
        $matter6->hoursPerWeek = 5;
        $matter6->created_by = 1;
        $matter6->save();

        $matter7 = new Matter;
        $matter7->desc = "Networks 2";
        $matter7->semester = 2;
        $matter7->hoursPerWeek = 5;
        $matter7->created_by = 1;
        $matter7->save();

        $matter8 = new Matter;
        $matter8->desc = "Math 1";
        $matter8->semester = 1;
        $matter8->hoursPerWeek = 5;
        $matter8->created_by = 1;
        $matter8->save();
    }
}
