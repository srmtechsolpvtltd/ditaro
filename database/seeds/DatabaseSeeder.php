<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
    	$role = new Role;
    	$role->name = 'admin';
    	$role->save();

    	$user = new User;
    	$user->name = 'Admin';
    	$user->email = 'admin@ditaro.com';
    	$user->password = bcrypt('secret');
    	$user->save();

    	$admin = Role::where('name', '=', 'admin')->first();
    	$user->roles()->attach($admin);
    }
}
