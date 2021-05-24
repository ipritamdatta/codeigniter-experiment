<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class PostSeeder extends Seeder
{
	public function run()
	{
		for($i=0;$i<20;$i++)
		{
			$this->db->table('posts')->insert($this->generatePost());
		}
	}

	public function generatePost(): array
	{
		$faker = Factory::create();

		$user = $this->db->table('users')->orderBy('user_id','RANDOM')->get()->getRow();

		return [
			'post_title' => $faker->sentence(5),
			'post_content' => $faker->sentence(10),
			'post_author' => $user->user_id
		];
	}
}
