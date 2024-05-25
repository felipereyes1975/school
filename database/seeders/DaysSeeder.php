<?php

namespace Database\Seeders;

use App\Models\Days;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $day1 = new Days;
        $day1->desc = 'Monday';
        $day1->created_by = 1;
        $day1->save();

        $day2 = new Days;
        $day2->desc = 'Tuesday';
        $day2->created_by = 1;
        $day2->save();

        $day3 = new Days;
        $day3->desc = 'Wednesday';
        $day3->created_by = 1;
        $day3->save();

        $day4 = new Days;
        $day4->desc = 'Thursday';
        $day4->created_by = 1;
        $day4->save();

        $day5 = new Days;
        $day5->desc = 'Friday';
        $day5->created_by = 1;
        $day5->save();

        $day6 = new Days;
        $day6->desc = 'Saturday';
        $day6->created_by = 1;
        $day6->save();

        $day7 = new Days;
        $day7->desc = 'Sunday';
        $day7->created_by = 1;
        $day7->save();
    }
}
