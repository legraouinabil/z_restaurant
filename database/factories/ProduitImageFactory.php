<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produit_Image;
use Faker\Generator as Faker;

$factory->define(Produit_Image::class, function (Faker $faker) {
    return [
       'image'=> $faker->imageUrl,
       'produit_id' => $faker->numberBetween($min = 2 , $max = 40)
    ];
});
