<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tweets\Entities\EntityDatabaseCollection;

/**
 * App\Entity
 *
 * @property int $id
 * @property int $tweet_id
 * @property string $body
 * @property string $body_plain
 * @property string $type
 * @property int $start
 * @property int $end
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \App\Tweets\Entities\EntityDatabaseCollection|static[] all($columns = ['*'])
 * @method static \App\Tweets\Entities\EntityDatabaseCollection|static[] get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity whereBodyPlain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity whereTweetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Entity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Entity extends Model
{
    protected $guarded = [];

    public function newCollection (array $models = []) {
        return new EntityDatabaseCollection($models);
    }
}
