<?php

use Faker\Generator as Faker;

$factory->define(App\Quote::class, function (Faker $faker) {
    return [
        'body'=>$faker->text(100),
    ];
});
