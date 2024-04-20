<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //'name','email','password',
        $user1 = new User;
        $user1->name = "Felipe";
        $user1->email = "felipe.reyes@zsenie.com";
        $user1->password = "password";
        $user1->save();
    }
}
