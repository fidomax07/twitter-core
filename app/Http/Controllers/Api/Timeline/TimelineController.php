<?php

namespace App\Http\Controllers\Api\Timeline;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TweetCollection;

class TimelineController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth:sanctum']);
	}

	public function index(Request $request)
	{
		/** @var User $user */
		$user = $request->user();

		$tweets = $user->tweetsFromFollowing()
			->parent()
			->latest()
			->with([
				'user',
				'likes',
				'retweets',
				'replies',
				'entities',
				'media.baseMedia',
				'originalTweet.user',
				'originalTweet.likes',
				'originalTweet.retweets',
				'originalTweet.media.baseMedia',
			])
			->paginate(9);

		return new TweetCollection($tweets);
	}
}
