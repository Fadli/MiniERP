<?php

use Illuminate\Database\Seeder;

class SentinelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus isi table users, groups, users_groups dan throttle
	 DB::table('role_users')->delete();
	 DB::table('roles')->delete();

	 DB::table('users')->delete();
	 DB::table('throttle')->delete();

	 //create role administrator
 	$role = Sentinel::getRoleRepository()->createModel()->create([
    'name' => 'Administrators',
    'slug' => 'administrators',
	]);

 	//create role regulars
	$role = Sentinel::getRoleRepository()->createModel()->create([
    'name' => 'Regulars',
    'slug' => 'regulars',
	]);

	//create user admin and activate
	$credentials = [
    'email'    => 'admin@enter.id',
    'password' => 'enter',
	];

	$user = Sentinel::registerAndActivate($credentials);

	//create user user and activate
	$credentials = [
    'email'    => 'user@example.com',
    'password' => 'enter',
	];

	$user = Sentinel::registerAndActivate($credentials);

	// assign user to a role
	$credentials = [
    'login' => 'admin@example.com',
	];

	$user = Sentinel::findByCredentials($credentials);

	//$user = Sentinel::findById(1);

	$role = Sentinel::findRoleByName('Administrators');

	$role->users()->attach($user);

	$credentials = [
    'login' => 'user@example.com',
	];

	$user = Sentinel::findByCredentials($credentials);

	//$user = Sentinel::findById(1);

	$role = Sentinel::findRoleByName('Regulars');

	$role->users()->attach($user);
    }
}
