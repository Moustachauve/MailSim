<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Message::class, function (Faker\Generator $faker) {

    return [
        'sender_id' => App\User::all()->random()->id,
        'content' => $faker->text($maxNbChars = 500),
    ];
});

$factory->define(App\MessageMeta::class, function (Faker\Generator $faker) {

    return [
        'owner_id' => App\User::all()->random()->id,
    ];
});
