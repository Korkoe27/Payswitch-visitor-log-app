<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */    public function run(): void
    {
        // Generate 50 employees assigned to the 5 pre-created departments
        Employee::factory()->count(10)->create();
    }
}
