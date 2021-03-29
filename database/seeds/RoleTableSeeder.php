<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign created permissions

        $roles = array(
            array('name' => 'superAdmin'),
            array('name' => 'admin'),
            array('name' => 'Employee'),
            array('name' => 'HR Manager'),
            array('name' => 'Store Manager'),
        );

        foreach($roles as $role){
            Role::create($role);
        }
    }
}
