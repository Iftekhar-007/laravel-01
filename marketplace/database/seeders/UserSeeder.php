<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'AdminUser',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Vendor/Agent
        User::create([
            'name' => 'VendorUser',
            'email' => 'vendor@example.com',
            'password' => Hash::make('vendor123'),
            'role' => 'vendor',
        ]);
    }
}

