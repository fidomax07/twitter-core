<?php

namespace App\Events\Tweets;

use App\Tweet;
use App\Http\Resources\TweetResource;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TweetWasCreated implements ShouldBroadcast
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	protected $tweet;

	/**
	 * Create a new event instance.
	 *
	 * @param Tweet $tweet
	 */
	public function __construct(Tweet $tweet)
	{
		$this->tweet = $tweet;
	}

	/**
	 * Undocumented function
	 *
	 * @return array
	 */
	public function broadcastWith()
	{
		return (new TweetResource($this->tweet))->jsonSerialize();
	}

	/**
	 * Undocumented function
	 *
	 * @return string
	 */
	public function broadcastAs()
	{
		return 'TweetWasCreated';
	}

	/**
	 * Get the channels the event should broadcast on.
	 *
	 * @return \Illuminate\Broadcasting\Channel|array
	 */
	public function broadcastOn()
	{
		return $this->tweet->user->followers
			->map(function ($user) {
				return new PrivateChannel('timeline.' . $user->id);
			})
			->toArray();
	}
}
