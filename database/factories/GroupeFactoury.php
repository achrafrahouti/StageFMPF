<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Groupe;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Groupe::class, function (Faker $faker) {
    $var=$faker->unique()->randomDigitNotNull;
    $g="Groupe".$var;
    return [
        'name'=>  $g,
    ];
});
