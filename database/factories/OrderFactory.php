<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        //

        'qteProduct' =>$faker->numberBetween($min=1 , $max=4),
        'produit_id' =>5,
        'clientName' =>$faker->name,
        'clientTel' =>$faker->phoneNumber,
        'clientAddresse' => $faker->address,
        'ville' =>$faker->city,
        'codePostal'=>$faker->countryCode,
        
    ];
});
