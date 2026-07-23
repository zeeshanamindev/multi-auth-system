<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // all permissions
        $permissions = [
            ['name' => 'Manage Users', 'slug' => 'manage-users', 'module' => 'User'],
            ['name' => 'View Reports', 'slug' => 'view-reports', 'module' => 'Report'],
            ['name' => 'Manage Content', 'slug' => 'manage-content', 'module' => 'Content'],
            ['name' => 'Delete Content', 'slug' => 'delete-content', 'module' => 'Content'],
            ['name' => 'Manage Settings', 'slug' => 'manage-settings', 'module' => 'Settings'],
            ['name' => 'Export Data', 'slug' => 'export-data', 'module' => 'Report'],
        ];

        // Role to permissions
        $rolePermissions = [
            'admin' => ['manage-users', 'view-reports', 'manage-content', 'delete-content', 'manage-settings', 'export-data'],
            'manager' => ['view-reports', 'manage-content'],
            'editor' => ['manage-content'],
            'user' => [],
        ];

        // permissions and assign to roles
        foreach ($permissions as $perm) {
            $permission = Permission::create($perm);
            
            foreach ($rolePermissions as $role => $perms) {
                if (in_array($permission->slug, $perms)) {
                    RolePermission::create([
                        'role' => $role,
                        'permission_id' => $permission->id,
                    ]);
                }
            }
        }
    }
}