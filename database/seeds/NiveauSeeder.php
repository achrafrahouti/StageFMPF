<?php

use App\Niveau;
use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $niveaus=[
            [
                'id'=>1,
                'liblle'=>'Niveau 1',
            ],
            [
                'id'=>2,
                'liblle'=>'Niveau 2',
            ],
            [
                'id'=>3,
                'liblle'=>'Niveau 3',
            ],
            [
                'id'=>4,
                'liblle'=>'Niveau 4',
            ],
            [
                'id'=>5,
                'liblle'=>'Niveau 5',
            ],
            [
                'id'=>6,
                'liblle'=>'Niveau 6',
            ],
        ];

        Niveau::insert($niveaus);
    }
}
