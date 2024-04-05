<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->createRoles();
        $this->createPermissions();
        $this->createUsers();

        $this->attachPermissionsToRoles();
        $this->attachRolesToUsers();

        User::factory(10)->create();
    }

    private function createRoles(): void
    {
        Role::create(['name' => 'super-admin', 'display_name' => 'Super Admin']);
        Role::create(['name' => 'admin', 'display_name' => 'Admin']);
        Role::create(['name' => 'author', 'display_name' => 'Author']);
        Role::create(['name' => 'user', 'display_name' => 'User']);
    }

    private function createPermissions(): void
    {
        Permission::create(['name' => 'create-user', 'display_name' => 'Create User']);
        Permission::create(['name' => 'view-user', 'display_name' => 'View User']);
        Permission::create(['name' => 'edit-user', 'display_name' => 'Edit User']);
        Permission::create(['name' => 'delete-user', 'display_name' => 'Delete User']);

        Permission::create(['name' => 'create-role', 'display_name' => 'Create Role']);
        Permission::create(['name' => 'view-role', 'display_name' => 'View Role']);
        Permission::create(['name' => 'edit-role', 'display_name' => 'Edit Role']);
        Permission::create(['name' => 'delete-role', 'display_name' => 'Delete Role']);

        Permission::create(['name' => 'create-permission', 'display_name' => 'Create Permission']);
        Permission::create(['name' => 'view-permission', 'display_name' => 'View Permission']);
        Permission::create(['name' => 'edit-permission', 'display_name' => 'Edit Permission']);
        Permission::create(['name' => 'delete-permission', 'display_name' => 'Delete Permission']);
    }

    private function createUsers(): void
    {
        User::create(['name' => 'Super', 'email' => 'super@super.com', 'password' => bcrypt('secretsuper')]);
        User::create(['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt('secretadmin')]);
        User::create(['name' => 'Author', 'email' => 'author@author.com', 'password' => bcrypt('secretauthor')]);
        User::create(['name' => 'User', 'email' => 'user@user.com', 'password' => bcrypt('secretuser')]);
    }

    private function attachPermissionsToRoles(): void
    {
        $roles = ['super-admin', 'admin', 'author', 'user'];
        $permissions = ['create-user', 'view-user', 'edit-user', 'delete-user', 'create-role', 'view-role', 'edit-role', 'delete-role', 'create-permission', 'view-permission', 'edit-permission', 'delete-permission'];

        foreach ($roles as $roleName) {
            $role = Role::where('name', $roleName)->first();

            foreach ($permissions as $permissionName) {
                $permission = Permission::where('name', $permissionName)->first();
                $role->permissions()->attach($permission);
            }
        }
    }

    private function attachRolesToUsers(): void
    {
        $users = ['super@super.com', 'admin@admin.com', 'author@author.com', 'user@user.com'];
        $roles = ['super-admin', 'admin', 'author', 'user'];

        foreach ($users as $index => $userEmail) {
            $user = User::where('email', $userEmail)->first();
            $role = Role::where('name', $roles[$index])->first();
            $user->roles()->attach($role);
        }
    }
}
