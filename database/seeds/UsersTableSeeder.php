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

        DB ::table('users')->insert([
        'name'=>  "Christinne William",
        'email'=>  "Christinne@W.com",
        'password'  =>  bcrypt('Christinne123'),
        'roles_id1' => 2,
        ]);

        DB ::table('users')->insert([
        'name'=>  "Michael Smith",
        'email'=>  "ChristinneW@W.com",
        'password'  =>  bcrypt('Chris123'),
        'roles_id1' => 2,
        ]);
    }
}
