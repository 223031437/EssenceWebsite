<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@essence.co.za'], 
            [
                'name' => 'Site Administrator',
                'password' => Hash::make('Login@2026'), 
                'role' => 'admin',
            ]
        );
    }
}