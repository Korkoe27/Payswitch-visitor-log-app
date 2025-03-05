<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Call other seeders
        $this->call([
            DepartmentSeeder::class,
            EmployeeSeeder::class,
            KeySeeder::class,
            VisitorAccessCardSeeder::class,
            ModuleSeeder::class,
            UserSeeder::class,
        ]);

        // Assign Permissions to Users
        $this->assignPermissions();
    }

    private function assignPermissions(): void
    {
        $users = User::all();
        $modules = Module::all();

        // Ensure there are users and modules
        if ($users->isEmpty() || $modules->isEmpty()) {
            $this->command->info('Skipping permissions: No users or modules found.');
            return;
        }

        foreach ($users as $user) {
            // Each user gets permissions for a random subset of modules
            $assignedModules = $modules->random(rand(3, $modules->count()));

            foreach ($assignedModules as $module) {
                Permission::create([
                    'user_id' => $user->id,
                    'module_id' => $module->id,
                    'can_view' => fake()->boolean(),
                    'can_create' => fake()->boolean(),
                    'can_modify' => fake()->boolean(),
                    'can_delete' => fake()->boolean(),
                ]);
            }
        }

        $this->command->info('Permissions assigned successfully.');
    }
}
