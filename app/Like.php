<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Like
 *
 * @property int $id
 * @property int $user_id
 * @property int $tweet_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like whereTweetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Like whereUserId($value)
 * @mixin \Eloquent
 */
class Like extends Model
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $guarded = [];
}
