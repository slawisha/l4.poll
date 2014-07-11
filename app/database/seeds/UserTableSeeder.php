<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$user = new User;
		$user->username = 'admin';
		$user->email = 'admin@pollapp.com';
		$user->password = Hash::make('admin');
		$user->save();
	}

}