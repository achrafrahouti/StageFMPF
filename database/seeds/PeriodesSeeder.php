<?php

use App\Periode;
use Illuminate\Database\Seeder;

class PeriodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodes =
        [
            [
                'id' => 1,
                'name'=> 'Periode 1',
                'niveau_id'=>'1',
                'date_debut'=>'2020-09-15',
                'date_fin' =>'2020-10-15',
                'created_at'=> '2019-04-15 19:14:42',
                'updated_at'=> '2019-04-15 19:14:42',
            ],
            [
                'id' => 2,
                'name'=> 'Periode 2',
                'niveau_id'=>'1',
                'date_debut'=>'2020-10-15',
                'date_fin' =>'2020-11-15',
                'created_at'=> '2019-04-15 19:14:42',
                'updated_at'=> '2019-04-15 19:14:42',
            ],
            [
                'id' => 3,
                'name'=> 'Periode 3',
                'niveau_id'=>'1',
                'date_debut'=>'2020-11-15',
                'date_fin' =>'2020-12-15',
                'created_at'=> '2019-04-15 19:14:42',
                'updated_at'=> '2019-04-15 19:14:42',
            ],
            [
                'id' => 4,
                'name'=> 'Periode 4',
                'niveau_id'=>'1',
                'date_debut'=>'2020-12-15',
                'date_fin' =>'2021-01-15',
                'created_at'=> '2019-04-15 19:14:42',
                'updated_at'=> '2019-04-15 19:14:42',
            ],
            [
                'id' => 5,
                'name'=> 'Periode 5',
                'niveau_id'=>'1',
                'date_debut'=>'2021-01-15',
                'date_fin' =>'2021-02-15',
                'created_at'=> '2019-04-15 19:14:42',
                'updated_at'=> '2019-04-15 19:14:42',
            ],
            ];
            Periode::insert($periodes);
    }
}
