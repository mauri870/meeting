<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mauri',
            'email' => 'mauri870@gmail.com',
            'phone' => '34534193',
            'password' => bcrypt('34534193'),
            'occupation_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'teste',
            'email' => 'teste@gmail.com',
            'phone' => '34534193',
            'password' => bcrypt('12345678'),
            'occupation_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => 'responsible',
            'email' => 'responsible@gmail.com',
            'phone' => '34534193',
            'password' => bcrypt('12345678'),
            'occupation_id' => 1,
        ]);
    }
}
