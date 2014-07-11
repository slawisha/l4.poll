<?php

class PollTableSeeder extends Seeder {

	public function run()
	{
			Poll::create([
				'question' => 'Who is the best tennis player?'
			]);

			Poll::create([
				'question' => 'Which programmimg language do you use?'
			]);

			Poll::create([
				'question' => 'Which PHP framework do you use?'
			]);
	}

}