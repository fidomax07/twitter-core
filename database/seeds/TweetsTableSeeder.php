<?php

use App\User;
use App\Tweet;
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
		$userIds = User::pluck('id');
		factory(Tweet::class, 100)
			->make()
			->each(function ($tweet, $idx) use ($userIds) {
				$tweet->fill([
					'user_id' => $userIds->random(),
					'body' => 'Tweet ' . (($idx + 1) < 10 ? '0' : '') . ($idx + 1)
				])->save();
			});
	}
}
