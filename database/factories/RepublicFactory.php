<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Republic;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Republic::class, function (Faker $faker) {
    return [
        'nameRepublic' => $faker->name,
        'bedroom' => $faker->buildingNumber,
        'telephoneRepublic' => $faker->buildingNumber,
        'address' => $faker->address,
    ];
});
