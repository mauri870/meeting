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
            'password' => bcrypt('34534193'),
        ]);

        DB::table('users')->insert([
            'name' => 'teste',
            'email' => 'teste@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' => 'responsible',
            'email' => 'responsible@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
