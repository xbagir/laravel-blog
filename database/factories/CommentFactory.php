<?php

use App\Article;
use App\Comment;
use App\Discussion;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $userIds        = User::pluck('id')->random();
    $discussionsIds = Discussion::pluck('id')->random();
    $type           = [Discussion::class, Article::class];

    return [
        'user_id'          => $userIds,
        'commentable_type' => $type[mt_rand(0, 1)],
        'commentable_id'   => $discussionsIds,
        'content'          => $faker->paragraph
    ];
});
