<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Follower;
use Faker\Generator as Faker;

$factory->define(Follower::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(App\User::class);
        },
        'following_id' => function() {
            return factory(App\User::class);
        }
    ];
});
