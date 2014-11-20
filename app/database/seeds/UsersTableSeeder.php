<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		
		User::create(array(
			'username' => 'rosangela',
			'password' => Hash::make('123456'),
			'first_name' => 'Rosangela',
			'last_name' => 'Romero',
			'email' => 'rosangelaromero@gmail.com',
			'type' => 'administrator',
			'status' => 'publish',
			));
		
		User::create(array(
			'username' => 'romeror',
			'password' => Hash::make('654321'),
			'first_name' => 'Rosangela',
			'last_name' => 'Romero',
			'email' => 'romerorosangela@gmail.com',
			'type' => 'operator',
			'status' => 'publish',
			));
		
	}

}