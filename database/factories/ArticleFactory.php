<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Article::class, function (Faker $faker) {

    $userIds     = \App\User::pluck('id')->random();
    $categoryIds = \App\Category::pluck('id')->random();
    $title       = $faker->unique()->sentence;

    return [
        'user_id'          => $userIds,
        'category_id'      => $categoryIds,
        'slug'             => str_slug($title),
        'title'            => $title,
        'subtitle'         => strtolower($title),
        'content'          => $faker->text(1000),
        'image'            => $faker->imageUrl(750, 250)
    ];
});