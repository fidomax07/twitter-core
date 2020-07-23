<?php

namespace App;

use App\Tweets\Entities\EntityType;
use Illuminate\Database\Eloquent\Model;
use App\Tweets\Entities\EntityExtractor;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Tweet
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $type
 * @property int|null $original_tweet_id
 * @property int|null $parent_id
 * @property-read \App\Tweets\Entities\EntityDatabaseCollection|\App\Entity[] $entities
 * @property-read int|null $entities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Like[] $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\TweetMedia[] $media
 * @property-read int|null $media_count
 * @property-read \App\Tweets\Entities\EntityDatabaseCollection|\App\Entity[] $mentions
 * @property-read int|null $mentions_count
 * @property-read \App\Tweet|null $originalTweet
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tweet[] $replies
 * @property-read int|null $replies_count
 * @property-read \App\Tweet|null $retweetedTweet
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Tweet[] $retweets
 * @property-read int|null $retweets_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet parent()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereOriginalTweetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tweet whereUserId($value)
 * @mixin \Eloquent
 */
class Tweet extends Model
{
	/**
	 * @var [type]
	 */
	protected $guarded = [];

	public static function boot()
	{
		parent::boot();

		static::created(function (Tweet $tweet) {
			$tweet->entities()->createMany(
				(new EntityExtractor($tweet->body))->getAllEntities()
			);
		});
	}

	/**
	 *
	 *
	 * @param Builder $builder
	 * @return Builder
	 */
	public function scopeParent(Builder $builder)
	{
		return $builder->whereNull('parent_id');
	}

	/**
	 *
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 *
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function originalTweet()
	{
		return $this->hasOne(Tweet::class, 'id', 'original_tweet_id');
	}

	/**
	 *
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function likes()
	{
		return $this->hasMany(Like::class);
	}

	/**
	 *
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function retweets()
	{
		return $this->hasMany(Tweet::class, 'original_tweet_id');
	}

	/**
	 *
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function retweetedTweet()
	{
		return $this->hasOne(Tweet::class, 'original_tweet_id', 'id');
	}

	/**
	 *
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function media()
	{
		return $this->hasMany(TweetMedia::class);
	}

	/**
	 *
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function replies()
	{
		return $this->hasMany(Tweet::class, 'parent_id');
	}

	/**
	 *
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function entities()
	{
		return $this->hasMany(Entity::class);
	}

	/**
	 *
	 *
	 * @return void
	 */
	public function mentions()
	{
		return $this->hasMany(Entity::class)
			->whereType(EntityType::MENTION);
	}
}
