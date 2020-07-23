<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Follower
 *
 * @property int $id
 * @property int $user_id
 * @property int $following_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Follower newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Follower newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Follower query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Follower whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Follower whereFollowingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Follower whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Follower whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Follower whereUserId($value)
 * @mixin \Eloquent
 */
class Follower extends Model
{
    //
}
