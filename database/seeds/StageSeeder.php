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
        'service_id'=>'1',        
        'niveau_id'=>'1',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
        [
        'id' => '2',
        'name'=>'Chirurgie B',
        'service_id'=>'1',
        'niveau_id'=>'1',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
        [
        'id' => '3',
        'name'=>' RadioX',
        'service_id'=>'1',
        'niveau_id'=>'1',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
        [
        'id' => '4',
        'name'=>'LAbo 1',
        'service_id'=>'5',        
        'niveau_id'=>'1',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
        [
        'id' => '5',
        'name'=>'Labo A',
        'service_id'=>'5',
        'niveau_id'=>'1',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
    ];
    Stage::insert($stages);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[1,1,1,1 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[2,1,2,2 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[3,1,3,3 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[4,1,4,4 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[5,1,5,5 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[6,2,1,2 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[7,2,2,3 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[8,2,3,4 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[9,2,4,5 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[10,2,5,1 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[11,3,1,3 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[12,3,2,4 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[13,3,3,5 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[14,3,4,1 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[15,3,5,2 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[16,4,1,4 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[17,4,2,5 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[18,4,3,1 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[19,4,4,2 ]);
    DB::insert('insert into stage_groupe_periode (id, stage_id , groupe_id , periode_id) values (?, ?, ?, ?)',[20,4,5,3 ]);


    }
}
