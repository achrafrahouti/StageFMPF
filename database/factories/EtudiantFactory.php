<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Etudiant;
use Faker\Generator as Faker;

$factory->define(Etudiant::class, function (Faker $faker) {
    $cne=$faker->randomLetter.$faker->unique()->randomNumber(8,$strict=true);
    return [
        'cne' =>strtoupper($cne) ,
        'nom' => $faker->firstName,
        'prenom' => $faker->lastName,
        'niveau_id'=>'1'


    ];
});
    