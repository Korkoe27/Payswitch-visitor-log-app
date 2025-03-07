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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@payswitch.com.gh',
            'password' => Hash::make('123212321'),
        ]);
        User::create([
            'name' => 'HR',
            'email' => 'hr@payswitch.com.gh',
            'password' => Hash::make('123212321'),
        ]);
        User::create([
            'name' => 'Security',
            'email' => 'security@payswitch.com.gh',
            'password' => Hash::make('123212321'),
        ]);
        User::create([
            'name' => 'Support',
            'email' => 'support@payswitch.com.gh',
            'password' => Hash::make('123212321'),
        ]);
    }
}