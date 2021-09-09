<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Feedback;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Feedback::class, function (Faker $faker) {
    return [
        //
        'nomComplete' =>$faker->name,
        'telephone' =>$faker->phoneNumber,
        'feedbackText' => $faker->paragraph(),
    ];
});
