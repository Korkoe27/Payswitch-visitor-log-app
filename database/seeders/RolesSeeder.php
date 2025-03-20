<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::create([
            'name' => 'Admin',
            'description'=> 'Has full access'
        ]);
        Roles::create([
            'name' => 'HR',
            'description'=> 'has access to daily events'
        ]);
        Roles::create([
            'name' => 'Security',
            'description'=> 'has access to basic features'
        ]);
        Roles::create([
            'name' => 'Support',
            'description'=> 'has access to logs and reports'
        ]);
    }
}
