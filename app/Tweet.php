<?php

namespace App;

use App\Tweets\Entities\EntityType;
use Illuminate\Database\Eloquent\Model;
use App\Tweets\Entities\EntityExtractor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Tweet
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
 * @property-read Tweet|null $originalTweet
 * @property-read \Illuminate\Database\Eloquent\Collection|Tweet[] $replies
 * @property-read int|null $replies_count
 * @property-read Tweet|null $retweetedTweet
 * @property-read \Illuminate\Database\Eloquent\Collection|Tweet[] $retweets
 * @property-read int|null $retweets_count
 * @property-read \App\User $user
 * @method static Builder|Tweet newModelQuery()
 * @method static Builder|Tweet newQuery()
 * @method static Builder|Tweet parent()
 * @method static Builder|Tweet query()
 * @method static Builder|Tweet whereBody($value)
 * @method static Builder|Tweet whereCreatedAt($value)
 * @method static Builder|Tweet whereId($value)
 * @method static Builder|Tweet whereOriginalTweetId($value)
 * @method static Builder|Tweet whereParentId($value)
 * @method static Builder|Tweet whereType($value)
 * @method static Builder|Tweet whereUpdatedAt($value)
 * @method static Builder|Tweet whereUserId($value)
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
	 * @return Tweet|Builder|HasMany
	 */
	public function mentions()
	{
		/** @var Tweet|Builder|HasMany $relationship */
		$relationship = $this->hasMany(Entity::class);

		return $relationship->whereType(EntityType::MENTION);
	}
}
