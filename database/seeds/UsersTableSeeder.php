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
        DB ::table('users')->insert([
        'name'=>  "Adnane",
        'email'=>  "adnane.bent@gmail.com",
        'password'  =>  bcrypt('adminadmin'),
        'roles_id1' => 1,
        ]);
    }
}
