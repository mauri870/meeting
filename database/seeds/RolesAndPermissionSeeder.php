<?php

use Illuminate\Database\Seeder;
use Artesaos\Defender\Facades\Defender;
use App\User;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $makeAdminRole = Defender::createRole('admin');

        $makeUserRole = Defender::createRole('user');

        $permission = Defender::createPermission('admin','All Admin Permissions');

        $userPermission = Defender::createPermission('user','User Permission');

        $responsiblePermission = Defender::createPermission('responsible','Meeting Responsible');

        //Admin
        $user = User::find(1);
        $user->attachRole($makeAdminRole);
        $user->attachPermission($permission);

        //User
        $user = User::find(2);
        $user->attachRole($makeUserRole);
        $user->attachPermission($userPermission);

        //Responsible meeting
        $user = User::find(3);
        $user->attachRole($makeAdminRole);
        $user->attachPermission($responsiblePermission);
    }
}
