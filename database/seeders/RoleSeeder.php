<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::create(['name' => 'admin', 'guard_name'   => 'web']);
        // Role::create(['name' => 'editor', 'guard_name'   => 'web']);
        // Role::create(['name' => 'user', 'guard_name'   => 'web']);

        Permission::create(['name' => 'create movie']);
        Permission::create(['name' => 'edit movie']);
        Permission::create(['name' => 'delete movie']);
        Permission::create(['name' => 'export movie']);

        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('create movie');
        $role1->givePermissionTo('edit movie');
        $role1->givePermissionTo('delete movie');
        $role1->givePermissionTo('export movie');

        $role2 = Role::create(['name' => 'editor']);
        $role2->givePermissionTo('edit movie');

        $role3 = Role::create(['name' => 'user']);
        // $role3->givePermissionTo('export movie');

    }
}
