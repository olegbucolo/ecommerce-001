<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => '12345']
        );

        User::updateOrCreate(
            ['email' => 'test@example2.com'],
            ['name' => 'Test User 2', 'password' => '123454']
        );

        User::updateOrCreate(
            ['email' => 'test@example3.com'],
            ['name' => 'Test User 3', 'password' => '123455']
        );
    }
}
