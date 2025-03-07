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
            // Determine permissions based on user role
            // Assuming User model has a 'role' column - adjust as needed
            switch (strtolower($user->role ?? 'employee')) {
                case 'admin':
                    $this->assignAdminPermissions($user, $modules);
                    break;
                case 'hr':
                    $this->assignHrPermissions($user, $modules);
                    break;
                case 'security':
                    $this->assignSecurityPermissions($user, $modules);
                    break;
                case 'support':
                    $this->assignSupportPermissions($user, $modules);
                    break;
                case 'audit':
                default:
                    $this->assignAuditPermissions($user, $modules);
                    break;
            }
        }

        $this->command->info('Permissions assigned successfully.');
    }

    private function assignAdminPermissions(User $user, $modules): void
    {
        foreach ($modules as $module) {
            Permission::create([
                'user_id' => $user->id,
                'module_id' => $module->id,
                'can_view' => 1,
                'can_create' => 1,
                'can_modify' => 1,
                'can_delete' => 1,
            ]);
        }
    }

    private function assignHrPermissions(User $user, $modules): void
    {
        foreach ($modules as $module) {
            Permission::create([
                'user_id' => $user->id,
                'module_id' => $module->id,
                'can_view' => 1,
                'can_create' => 1,
                'can_modify' => 1,
                'can_delete' => 0, // Managers can't delete
            ]);
        }
    }

    private function assignSecurityPermissions(User $user, $modules): void
    {
        foreach ($modules as $module) {
            Permission::create([
                'user_id' => $user->id,
                'module_id' => $module->id,
                'can_view' => 1,
                'can_create' => 1, // Employees can't create
                'can_modify' => 1, // Employees can't modify
                'can_delete' => 0, // Employees can't delete
            ]);
        }
    }
    private function assignAuditPermissions(User $user, $modules): void
    {
        foreach ($modules as $module) {
            Permission::create([
                'user_id' => $user->id,
                'module_id' => $module->id,
                'can_view' => 1,
                'can_create' => 0, // Employees can't create
                'can_modify' => 0, // Employees can't modify
                'can_delete' => 0, // Employees can't delete
            ]);
        }
    }
    private function assignSupportPermissions(User $user, $modules): void
    {
        foreach ($modules as $module) {
            Permission::create([
                'user_id' => $user->id,
                'module_id' => $module->id,
                'can_view' => 1,
                'can_create' => 1, // Employees can't create
                'can_modify' => 1, // Employees can't modify
                'can_delete' => 0, // Employees can't delete
            ]);
        }
    }
}