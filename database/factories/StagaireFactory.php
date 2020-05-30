<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stagaire;
use Faker\Generator as Faker;

$factory->define(Stagaire::class, function (Faker $faker) {
    return [
        'etudiant_id'=>factory(App\Etudiant::class)->create()->id,
    ];
});
