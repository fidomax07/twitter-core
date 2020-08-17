<?php

use Illuminate\Database\Seeder;

class TweetsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$userIds = App\User::pluck('id')->filter(function ($id) {
			return $id != 1;
		});

		factory(App\Tweet::class, 100)->make()->each(function (App\Tweet $tweet, $index) use ($userIds) {
			$tweet->fill([
				'user_id' => 1,
				'body' => 'Tweet ' . (($index + 1) < 10 ? '0' : '') . ($index + 1)
			])->save();
		});
	}
}
