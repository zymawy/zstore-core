<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'view requests']);
        Permission::create(['name' => 'view products']);
        Permission::create(['name' => 'edut profile']);
        Permission::create(['name' => 'publish prodects']);
        Permission::create(['name' => 'edit prodects']);

        // create roles and assign created permissions

        $role = Role::create(['name' => 'dresser']);
        $role->givePermissionTo('view requests');

        $role = Role::create(['name' => 'customer']);
        $role->givePermissionTo(['view products', 'edut profile']);

        $role = Role::create(['name' => 'seller']);
        $role->givePermissionTo(['publish prodects', 'edit prodects']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
