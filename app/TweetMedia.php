<?php

namespace App;

use App\Media\Media;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

/**
 * App\TweetMedia
 *
 * @property int $id
 * @property int|null $tweet_id
 * @property int|null $media_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Media|null $baseMedia
 * @property-read \Illuminate\Database\Eloquent\Collection|Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|TweetMedia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TweetMedia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TweetMedia query()
 * @method static \Illuminate\Database\Eloquent\Builder|TweetMedia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TweetMedia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TweetMedia whereMediaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TweetMedia whereTweetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TweetMedia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TweetMedia extends Model implements HasMedia
{
    use HasMediaTrait;

    public function baseMedia()
    {
        return $this->belongsTo(Media::class, 'media_id');
    }
}
