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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    static $adminCreated = false;

    if ( ! $adminCreated)
    {
        $name         = 'admin';
        $email        = 'admin@admin.local';
        $isAdmin      = 1;
        $adminCreated = true;
    }
    else
    {
        $name    = $faker->unique()->name;
        $email   = $faker->unique()->safeEmail;
        $isAdmin = 0;
    }

    return [
        'name'           => $name,
        'email'          => $email,
        'password'       => $password ?: $password = bcrypt('123123'),
        'is_admin'       => $isAdmin,
        'image'          => $faker->imageUrl(64, 64),
        'remember_token' => str_random(10),
    ];
});
