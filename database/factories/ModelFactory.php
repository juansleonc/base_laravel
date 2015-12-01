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
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'username' => $faker->unique()->userName,
        'password' => bcrypt(str_random(10)),
        'role' =>$faker->randomElement(['user', 'editor']),
        'active' => $faker->boolean(),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\Post::class, 'active', function($faker){
    return [
        'title' => $faker->sentence(),
        'body' => $faker->text,
        'active' => true,
    ];
});

$factory->defineAs(App\Post::class, 'inactive', function($faker){
    return [
        'title' => $faker->sentence(),
        'body' => $faker->text,
        'active' => false,
    ];
});