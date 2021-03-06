<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('roles')->insert([
            'slug' => 'admin',
            'name' => 'Administrateur',
        ]);
            DB::table('roles')->insert([
            'slug' => 'user',
            'name' => 'Editeur',
        ]);
    }
}
