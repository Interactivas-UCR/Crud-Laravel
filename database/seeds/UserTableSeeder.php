<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use TRAINERPOKEMON\User;
use TRAINERPOKEMON\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@pokedex.com";
        $user->password = Hash::make('123123123');

        $user->save();

        $role = Role::where('name', 'admin')->first();

        $user->roles()->attach($role);
    }
}
