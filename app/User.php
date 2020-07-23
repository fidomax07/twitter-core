<?php

namespace App;

use App\Tweets\TweetType;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $followers
 * @property-read int|null $followers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $following
 * @property-read int|null $following_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Like[] $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tweet[] $retweets
 * @property-read int|null $retweets_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tweet[] $tweets
 * @property-read int|null $tweets_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tweet[] $tweetsFromFollowing
 * @property-read int|null $tweets_from_following_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'username', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	/**
	 * Undocumented function
	 *
	 * @return string
	 */
	public function avatar()
	{
		return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?d=mp';
	}

	/**
	 * Undocumented function
	 *
	 * @param Tweet $tweet
	 * @return boolean
	 */
	public function hasLiked(Tweet $tweet)
	{
		return $this->likes->contains('tweet_id', $tweet->id);
	}

	/**
	 * Undocumented function
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function tweets()
	{
		return $this->hasMany(Tweet::class);
	}

	/**
	 * Undocumented function
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function following()
	{
		return $this->belongsToMany(
			User::class, 'followers', 'user_id', 'following_id'
		);
	}

	/**
	 * Undocumented function
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function followers()
	{
		return $this->belongsToMany(
			User::class, 'followers', 'following_id', 'user_id'
		);
	}

	/**
	 * Undocumented function
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
	 */
	public function tweetsFromFollowing()
	{
		return $this->hasManyThrough(
			Tweet::class, Follower::class, 'user_id', 'user_id', 'id', 'following_id'
		);
	}

	/**
	 * Undocumented function
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function likes()
	{
		return $this->hasMany(Like::class);
	}

	/**
	 * Undocumented function
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function retweets()
	{
		return $this->hasMany(Tweet::class)
			->where('type', TweetType::RETWEET)
			->orWhere('type', TweetType::QUOTE);
	}
}
