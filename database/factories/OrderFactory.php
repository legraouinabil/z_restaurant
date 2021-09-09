<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        //

        'orderCost' =>$faker->numberBetween($min=1 , $max=4),
        'qte' =>$faker->numberBetween($min=1 , $max=4),
        'produit_id' => $faker->numberBetween($min = 2, $max =20),
        'nomComplet' =>$faker->name,
        'telephone' =>$faker->phoneNumber,
        'adressPostal' => $faker->address,
        'ville' =>$faker->city,
       
        
    ];
});
