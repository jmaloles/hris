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
        DB::table('users')->insert(
            array(
                array(
                    'name'          => env('USER_NAME'),
                    'email'         => env('USER_EMAIL'),
                    'password'      => bcrypt(env('USER_PASSWORD')),
                    'role'          => env('USER_ROLE'),
                    'created_at'    => date('Y-m-d h:i:s'),
                    'updated_at'    => date('Y-m-d h:i:s')
                )
            )
        );
    }
}
