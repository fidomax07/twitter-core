<?php

namespace App\Notifications;

use ReflectionClass;
use Illuminate\Notifications\Notification;

class DatabaseNotificationChannel
{
	public function send($notifiable, Notification $notification)
	{
		$data = $notification->toArray($notifiable);

		$type = 'TweetLiked';
		try {
			$type = (new ReflectionClass($notification))->getShortName();
		} catch (\ReflectionException $e) {
		}

		return $notifiable->routeNotificationFor('database')->create([
			'id' => $notification->id,
			'type' => $type,
			'data' => $data,
			'read_at' => null,
		]);
	}
}
