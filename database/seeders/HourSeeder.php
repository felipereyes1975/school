<?php

namespace Database\Seeders;

use App\Models\Hour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $hour1 = new Hour;
        $hour1->start_at = '16:00:00';
        $hour1->end_at = '16:50:00';
        $hour1->created_by = 1;
        $hour1->save();

        $hour2 = new Hour;
        $hour2->start_at = '16:50:00';
        $hour2->end_at = '17:40:00';
        $hour2->created_by = 1;
        $hour2->save();

        $hour3 = new Hour;
        $hour3->start_at = '17:40:00';
        $hour3->end_at = '18:30:00';
        $hour3->created_by = 1;
        $hour3->save();

        $hour4 = new Hour;
        $hour4->start_at = '18:30:00';
        $hour4->end_at = '19:20:00';
        $hour4->created_by = 1;
        $hour4->save();

        $hour5 = new Hour;
        $hour5->start_at = '19:20:00';
        $hour5->end_at = '20:10:00';
        $hour5->created_by = 1;
        $hour5->save();

        $hour6 = new Hour;
        $hour6->start_at = '20:10:00';
        $hour6->end_at = '21:00:00';
        $hour6->created_by = 1;
        $hour6->save();

        $hour6 = new Hour;
        $hour6->start_at = '21:00:00';
        $hour6->end_at = '21:50:00';
        $hour6->created_by = 1;
        $hour6->save();
    }
}
