<?php

namespace App\Events\Tweets;

use App\User;
use App\Tweet;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TweetLikesWereUpdated implements ShouldBroadcast
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	protected $user;

	protected $tweet;

	/**
	 * Create a new event instance.
	 *
	 * @param User $user
	 * @param Tweet $tweet
	 */
	public function __construct(User $user, Tweet $tweet)
	{
		$this->user = $user;
		$this->tweet = $tweet;
	}

	/**
	 * Undocumented function
	 *
	 * @return array
	 */
	public function broadcastWith()
	{
		return [
			'id' => $this->tweet->id,
			'user_id' => $this->user->id,
			'count' => $this->tweet->likes->count(),
		];
	}

	/**
	 * Undocumented function
	 *
	 * @return string
	 */
	public function broadcastAs()
	{
		return 'TweetLikesWereUpdated';
	}

	/**
	 * Get the channels the event should broadcast on.
	 *
	 * @return \Illuminate\Broadcasting\Channel|array
	 */
	public function broadcastOn()
	{
		return new Channel('tweets');
	}
}
