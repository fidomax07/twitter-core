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
    	$userIds = App\User::pluck('id')->filter(function($id) {
    		return $id != 1;
	    });
        factory(App\Tweet::class, 15)->make()->each(function(App\Tweet $tweet) use ($userIds) {
        	$tweet->fill(['user_id' => $userIds->random()])->save();
        });
    }
}
