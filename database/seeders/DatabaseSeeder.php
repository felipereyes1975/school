<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\User;
//use Database\Factories\StudentFactory;
use App\Models\Student;
use App\Models\Teacher;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            HourSeeder::class,
            MatterSeeder::class,
            DaysSeeder::class
        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory(10)->create();
        Student::factory(50)->create();
        Teacher::factory(10)->create();
        Classroom::factory(10)->create();
    }
}
