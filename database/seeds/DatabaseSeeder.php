<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


        $this->call(RolesAndPermissionSeeder::class);
        $this->call(\Modules\Meeting\Database\Seeders\OccupationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(\Modules\Meeting\Database\Seeders\PostsTableSeeder::class);
        $this->call(\Modules\Meeting\Database\Seeders\MeetingTableSeeder::class);

        Model::reguard();
    }
}
