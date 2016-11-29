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

$factory->define(App\User::class, function(Faker\Generator $faker) {
    static $password;

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ? : $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function(Faker\Generator $faker) {
    return [
        'title'       => $faker->sentence,
        'text'        => $faker->sentences(10, true),
        'description' => $faker->sentences(2, true),
        'user_id'     => App\User::find(rand(1, 3))->id,
    ];
});

$factory->define(App\Category::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word
    ];
});