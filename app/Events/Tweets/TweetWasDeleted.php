<?php

namespace App\Events\Tweets;

use App\Tweet;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TweetWasDeleted implements ShouldBroadcast
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
        return [
            'id' => $this->tweet->id
        ];
    }

    /**
     * Undocumented function
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'TweetWasDeleted';
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
