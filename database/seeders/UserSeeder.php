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
            'name' => 'User',
            'email' => 'user@payswitch.com.gh',
            'password' => Hash::make('St.Anthony27'),
        ]);
        User::create([
            'name' => 'Korkoe',
            'email' => 'korkoe@payswitch.com.gh',
            'password' => Hash::make('123212321'),
        ]);
    }
}