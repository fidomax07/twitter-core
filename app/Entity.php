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
 * @method static EntityDatabaseCollection|static[] all($columns = ['*'])
 * @method static EntityDatabaseCollection|static[] get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Entity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Entity whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entity whereBodyPlain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entity whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entity whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entity whereTweetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entity whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Entity extends Model
{
    protected $guarded = [];

    public function newCollection (array $models = []) {
        return new EntityDatabaseCollection($models);
    }
}
