<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\school;
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

$factory->define(school::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'images' => 'images/avatar2.png',
        'phone' => '1231231234',
    ];
});
