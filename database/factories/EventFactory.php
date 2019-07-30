<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Event;
use App\User;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        //

        "user_id" => User::all()->random()->id,
        "titre" => $faker->title(),
        "description" => $faker->paragraph(),

    ];
});