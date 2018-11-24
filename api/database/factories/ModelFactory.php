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
    $email = $faker->unique()->email;
    echo $email . '
    ';
    return [
        'name'     => $faker->name,
        'email'    => $email,
        'password' => \Illuminate\Support\Facades\Hash::make('12345'),
    ];
});
