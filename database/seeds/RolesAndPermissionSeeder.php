<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create the roles
        $user = new Role();
        $user->name         = 'user';
        $user->display_name = 'Normal user'; // optional
        $user->description  = ''; // optional
        $user->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();


        //Create the permissions

        $adminPermission = new Permission();
        $adminPermission->name = 'admin';
        $adminPermission->display_name = 'Administrador'; // optional

        // Allow a user to...
        $adminPermission->description  = 'All permissions'; // optional
        $adminPermission->save();


    }
}
