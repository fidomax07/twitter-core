<?php

namespace App\Http\Controllers\Tweets;

use App\Tweet;
use App\Http\Controllers\Controller;

class TweetController extends Controller
{
	/**
	 * @param Tweet $tweet
	 * @return \Illuminate\View\View
	 */
	public function show(Tweet $tweet)
	{
		return view('tweets.show', compact('tweet'));
	}
}
