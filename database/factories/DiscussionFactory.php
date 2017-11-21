<?php

use Faker\Generator as Faker;

$factory->define(App\Discussion::class, function (Faker $faker) {

    $userIds = \App\User::pluck('id')->random();

    return [
        'user_id' => $userIds,
        'title'   => $faker->sentence,
        'content' => $faker->paragraph,
        'image'   => $faker->imageUrl(64, 64),
    ];
});
