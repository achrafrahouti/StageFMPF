<?php

use App\Stage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $stages= 
    [
        [
        'id' => '1',
        'name'=>'Chirurgie A',
        'service_id'=>'6',        
        'niveau_id'=>'2',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
        [
        'id' => '2',
        'name'=>'Chirurgie B',
        'service_id'=>'6',
        'niveau_id'=>'2',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
        [
        'id' => '3',
        'name'=>' Urgences',
        'service_id'=>'4',
        'niveau_id'=>'2',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
        [
        'id' => '4',
        'name'=>'Urgences',
        'service_id'=>'5',        
        'niveau_id'=>'2',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
        [
        'id' => '5',
        'name'=>'Cardiologie',
        'service_id'=>'5',
        'niveau_id'=>'2',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
        [
        'id' => '6',
        'name'=>'Médecine Interne',
        'service_id'=>'5',
        'niveau_id'=>'2',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
                 [
        'id' => '7',
        'name'=>'CCV',
        'service_id'=>'5',
        'niveau_id'=>'1',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
                 [
        'id' => '8',
        'name'=>'Pneumologie',
        'service_id'=>'5',
        'niveau_id'=>'1',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
                 [
        'id' => '9',
        'name'=>'Gastro-entéro',
        'service_id'=>'2',
        'niveau_id'=>'1',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
                 [
        'id' => '10',
        'name'=>'Chir Thoracique',
        'service_id'=>'6',
        'niveau_id'=>'1',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
                 [
        'id' => '11',
        'name'=>'Médecine Interne',
        'service_id'=>'5',
        'niveau_id'=>'1',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
                 [
        'id' => '12',
        'name'=>'Laboratoire',
        'service_id'=>'5',
        'niveau_id'=>'1',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
            
    ];
    Stage::insert($stages);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[1,1,13,1 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[2,1,14,2 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[3,1,15,3 ]);
    // DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[4,1,16,4 ]);
    // DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[5,1,17,5 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[6,2,13,2 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[7,2,14,3 ]);
    // DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[8,2,15,4 ]);
    // DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[9,2,16,5 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[10,2,17,1 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[11,3,13,3 ]);
    // DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[12,3,14,4 ]);
    // DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[13,3,15,5 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[14,3,16,1 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[15,3,17,2 ]);
    // DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[16,4,1,4 ]);
    // DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[17,4,2,5 ]);
    // DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[18,4,3,1 ]);
    // DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[19,4,4,2 ]);
    // DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[20,4,5,3 ]);


    }
}
