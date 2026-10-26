<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'admin',
            'email' => 'Alhikma59@hotmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('jakbo2-jijhux-qutWub'),
        ]);

        // Additional test users
        User::create([
            'name' => 'محمد أحمد',
            'email' => 'mohammed@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'فاطمة علي',
            'email' => 'fatima@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'أحمد محمود',
            'email' => 'ahmed@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
    }
}
