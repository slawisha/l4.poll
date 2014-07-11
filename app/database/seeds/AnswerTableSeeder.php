<?php

class AnswerTableSeeder extends Seeder {

	public function run()
	{
			Answer::create([
				'poll_id' => 1,
				'text' => 'Novak Djokovic',
				'votes' => 0
			]);

			Answer::create([
				'poll_id' => 1,
				'text' => 'Roger Federer',
				'votes' => 0
			]);

			Answer::create([
				'poll_id' => 1,
				'text' => 'Rafael Nadal',
				'votes' => 0
			]);

			Answer::create([
				'poll_id' => 2,
				'text' => 'Ruby',
				'votes' => 0
			]);

			Answer::create([
				'poll_id' => 2,
				'text' => 'PHP',
				'votes' => 0
			]);

			Answer::create([
				'poll_id' => 2,
				'text' => 'Pyton',
				'votes' => 0
			]);

			Answer::create([
				'poll_id' => 2,
				'text' => 'Javascript',
				'votes' => 0
			]);

			Answer::create([
				'poll_id' => 3,
				'text' => 'Symfony',
				'votes' => 0
			]);

			Answer::create([
				'poll_id' => 3,
				'text' => 'Codeigniter',
				'votes' => 0
			]);

			Answer::create([
				'poll_id' => 3,
				'text' => 'Laravel',
				'votes' => 0
			]);

	}

}