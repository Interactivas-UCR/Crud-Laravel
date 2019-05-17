<?php

use Illuminate\Database\Seeder;
use TRAINERPOKEMON\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = "admin";
        $role->description = 'Super Admin B...!!!';
        $role->save();

        $role = new Role();
        $role->name = "user";
        $role->description = 'Just the basic user';
        $role->save();
    }
}
