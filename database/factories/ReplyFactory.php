<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'conversation_id' => factory(App\Conversation::class),
        'user_id' => factory(App\User::class),
        'body' => $faker->paragraph,
    ];
});
