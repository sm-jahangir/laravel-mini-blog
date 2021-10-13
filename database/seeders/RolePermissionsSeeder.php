<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
           // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Dashboard permissions
        Permission::create(['name' => 'dashboard-view']);

        //BLog Permssions
        Permission::create(['name' => 'blog-create']);
        Permission::create(['name' => 'blog-view']);
        Permission::create(['name' => 'blog-edit']);
        Permission::create(['name' => 'blog-delete']);
        Permission::create(['name' => 'blog-approve']);

        //Page Permissions
        Permission::create(['name' => 'page-create']);
        Permission::create(['name' => 'page-view']);
        Permission::create(['name' => 'page-edit']);
        Permission::create(['name' => 'page-delete']);
        Permission::create(['name' => 'page-approve']);

        //Category Permisions
        Permission::create(['name' => 'category-create']);
        Permission::create(['name' => 'category-view']);
        Permission::create(['name' => 'category-edit']);
        Permission::create(['name' => 'category-delete']);
        Permission::create(['name' => 'category-approve']);

        //Tag Permissions
        Permission::create(['name' => 'tag-create']);
        Permission::create(['name' => 'tag-view']);
        Permission::create(['name' => 'tag-edit']);
        Permission::create(['name' => 'tag-delete']);
        Permission::create(['name' => 'tag-approve']);

        //Role Permissions
        Permission::create(['name' => 'role-view']);
        Permission::create(['name' => 'role-create']);
        Permission::create(['name' => 'role-edit']);
        Permission::create(['name' => 'role-delete']);
        Permission::create(['name' => 'role-approve']);
        Permission::create(['name' => 'role-update']);

        //User Permissions
        Permission::create(['name' => 'admin-view']);
        Permission::create(['name' => 'admin-create']);
        Permission::create(['name' => 'admin-edit']);
        Permission::create(['name' => 'admin-delete']);
        Permission::create(['name' => 'admin-approve']);
        Permission::create(['name' => 'admin-update']);

        //Profile Permissions
        Permission::create(['name' => 'profile-view']);
        Permission::create(['name' => 'profile-edit']);
        Permission::create(['name' => 'profile-update']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'editor']);
        $role1->givePermissionTo('dashboard-view');
        $role1->givePermissionTo('blog-create');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('dashboard-view');
        $role2->givePermissionTo('blog-create');
        $role2->givePermissionTo('blog-view');
        $role2->givePermissionTo('blog-edit');
        $role2->givePermissionTo('blog-delete');
        $role2->givePermissionTo('blog-approve');

        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'No Permission User',
            'username' => 'nopermissionsuser',
            'email' => 'nopermissionsuser@mail.com',
            'password' => Hash::make('password'),
        ]);
        $user = \App\Models\User::factory()->create([
            'name' => 'Editor User',
            'username' => 'editor',
            'email' => 'editor@mail.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin User',
            'username' => 'super-admin',
            'email' => 'superadmin@mail.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($role3);
    }
}
