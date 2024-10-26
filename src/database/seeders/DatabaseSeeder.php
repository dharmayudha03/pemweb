<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed permissions first
        $this->seedPermissions();

        // Seed users and roles
        $this->seedUsers();

        // Call additional seeders
        $this->callSeeders();
    }

    /**
     * Seed permissions related to Analyze.
     */
    private function seedPermissions(): void
    {
        // Create permissions for Analyze with consistent naming
        Permission::firstOrCreate(['name' => 'create_analyze', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'edit_analyze', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'delete_analyze', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'update_analyze', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'view_analyze', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'view_any_analyze', 'guard_name' => 'web']);
    }

    /**
     * Seed users and roles, and assign permissions.
     */
    private function seedUsers(): void
    {
        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'super_admin']);
        $userRole = Role::firstOrCreate(['name' => 'User']);

        // Assign Analyze permissions to User role
        $userRole->givePermissionTo([
            'create_analyze',
            'edit_analyze',
            'delete_analyze',
            'update_analyze',
            'view_analyze',
            'view_any_analyze',
        ]);

        // Create admin user
        $admin = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);
        $admin->assignRole('super_admin');

        // Create regular user
        $user = \App\Models\User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
        ]);
        $user->assignRole('User');
    }

    /**
     * Call additional seeders.
     */
    private function callSeeders(): void
    {
        $this->call([
            DomainSeeder::class,
            AspectSeeder::class,
            SubjectSeeder::class,
            IndicatorSeeder::class,
            LevelingIndexSeeder::class,
            DetailLevelingIndexSeeder::class,
            RecomendationSeeder::class,
            AnalyzeSeeder::class,
        ]);
    }
}
