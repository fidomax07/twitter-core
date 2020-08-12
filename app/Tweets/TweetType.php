<?php

namespace App\Tweets;

class TweetType
{
	const TWEET = 'tweet';
	const RETWEET = 'retweet';
	const QUOTE = 'quote';

	/**
	 * Get all possible tweet types.
	 *
	 * @return string[]
	 */
	public static function getTweetTypes()
	{
		return [
			self::TWEET,
			self::RETWEET,
			self::QUOTE
		];
	}
}