<?php

namespace App\Notifications\Tweets;

use App\User;
use App\Tweet;
use Illuminate\Bus\Queueable;
use App\Http\Resources\UserResource;
use App\Http\Resources\TweetResource;
use Illuminate\Notifications\Notification;
use App\Notifications\DatabaseNotificationChannel;

class TweetLiked extends Notification
{
	use Queueable;

	/**
	 * Undocumented variable
	 *
	 * @var [type]
	 */
	protected $user;

	/**
	 * Undocumented variable
	 *
	 * @var [type]
	 */
	protected $tweet;

	/**
	 * Create a new notification instance.
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
	 * Get the notification's delivery channels.
	 *
	 * @param mixed $notifiable
	 * @return array
	 */
	public function via($notifiable)
	{
		return [
			DatabaseNotificationChannel::class
		];
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @param mixed $notifiable
	 * @return array
	 */
	public function toArray($notifiable)
	{
		return [
			'user' => new UserResource($this->user),
			'tweet' => new TweetResource($this->tweet),
		];
	}
}
