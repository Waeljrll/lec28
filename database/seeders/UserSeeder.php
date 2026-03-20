<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "islam",
            "email" => "islam@gmail.com",
            "password" => Hash::make(123456),
        ]);
        User::create([
            "name" => "ali",
            "email" => "ali@gmail.com",
            "password" => Hash::make(123456),
        ]);
        User::create([
            "name" => "ahmed",
            "email" => "ahmed@gmail.com",
            "password" => Hash::make(123456),
        ]);
    }
}
