<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Contact;
use Faker\Generator as Faker;
use App\User;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        //
        "user_id" => User::all()->random()->id,
        "email" => $faker->safeEmail(),
        "sujet" => $faker->title(),
        "message" => $faker->paragraph()
    ];
});