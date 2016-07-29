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
        'username' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Apero::class, function (Faker\Generator $faker) {


    $titles = array('Apero wodpress', 'Apero php', 'Apero jQuery', 'Apero laravel', 'Apero mobile');
    $status = ['published', 'unpublished'];

    return [
        'title' => $titles[rand(0,4)],
        'date_event' => $faker->dateTimeBetween($startDate= 'now', $endDate='+1 years'),
        'abstract' => $faker->paragraph(),
        'status' => $status[rand(0,1)],
        'content' => $faker->text(),
    ];
});