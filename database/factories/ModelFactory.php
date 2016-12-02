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

    $userIds = App\User::all()->pluck('id')->toArray();

    return [
        'sender_id' => $faker->randomElement($userIds),
        'date_sent' => $faker->dateTimeBetween($startDate = '-3 months', $endDate = 'now', $timezone = date_default_timezone_get()),
        'title' => $faker->sentence(6, true),
        'content' => $faker->realText($maxNbChars = 500),
    ];
});

$factory->define(App\MessageMeta::class, function (Faker\Generator $faker) {

    $userIds = App\User::all()->pluck('id')->toArray();

    return [
        'owner_id' => $faker->randomElement($userIds),
    ];
});
