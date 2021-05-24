<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		for($i=0;$i<10;$i++)
		{
			$this->db->table('users')->insert($this->generateUser());
		}
	}

	public function generateUser(): array
	{
		$faker = Factory::create();

		return [
			'user_name' => $faker->name(),
			'user_email'=> $faker->email(),
			'user_password' => password_hash('password',PASSWORD_DEFAULT)
		];
	}
}
