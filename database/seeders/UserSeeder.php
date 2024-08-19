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
        User::create([
            "npwp" => "121212121212345",
            "name" => "admin",
            "password" => bcrypt("1"),
            "user_type" => "admin",
            "address" => "Jl. Jend. Sudirman No. 10",
        ]);

        User::create([
            "npwp" => "121212121213813",
            "name" => "PT. Bahagia Selalu",
            "password" => bcrypt("2"),
            "user_type" => "user",
            "address" => "Jl. Jend. Sudirman No. 10",
        ]);
    }
}
