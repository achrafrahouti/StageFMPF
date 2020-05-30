<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Etudiant;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Etudiant::class, function (Faker $faker) {
    return [
        'cne' => $faker->unique()->randomNumber(8),
        'nom' => $faker->firstName,
        'prenom' => $faker->lastName,
        'niveau_id'=>'2'


    ];
});
    