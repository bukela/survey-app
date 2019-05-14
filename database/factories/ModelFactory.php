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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Role::class, function () {
    return [
        'code' => null,
        'name' => null,
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;
    $name = $faker->unique()->name;

    return [
        'name'           => $name,
        'parent_id'      => null,
        'role_id'        => null,
        'email'          => $faker->unique()->safeEmail,
        'slug'           => str_slug($name),
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Survey::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->unique()->word,
    ];
});
