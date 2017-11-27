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
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '0987548356',
            'password' => app('hash')->make('secret'),
            'role' => 1,
            'id_table' => 1,
        ]);
    }
}
