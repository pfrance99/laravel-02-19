<?php

use Faker\Generator as Faker;

$factory->define(App\Trip::class, function (Faker $faker) {
    return [
        'label' => $faker->catchPhrase,
        'country' => $faker->country,
        'city'=> $faker->city,
        'startDate' => $faker->dateTimeInInterval($startDate = '0 years', $interval = '+ 6 months', $timezone = 'Europe/Paris'), // DateTime('2003-03-15 02:00:49', 'Antartica/Vostok')
        'endDate' => $faker->dateTimeInInterval($startDate = '+ 7 months', $interval = '+ 30 days', $timezone = 'Europe/Paris'),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 9999999999),
        'picture' => $faker->imageUrl(),
        'description' => $faker->text,
        'availability' => $faker->boolean
    ];
});
