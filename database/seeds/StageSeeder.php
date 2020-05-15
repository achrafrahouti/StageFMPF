<?php

use App\Stage;
use Illuminate\Database\Seeder;

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
        'service_id'=>'1',        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
        [
        'id' => '2',
        'name'=>'Chirurgie B',
        'service_id'=>'1',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
        [
        'id' => '3',
        'name'=>' RadioX',
        'service_id'=>'1',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
        [
        'id' => '4',
        'name'=>'LAbo 1',
        'service_id'=>'5',        
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
        [
        'id' => '5',
        'name'=>'Labo A',
        'service_id'=>'5',
        'created_at'=> '2019-04-15 19:14:42',
        'updated_at'=> '2019-04-15 19:14:42',
        ],
    ];
    Stage::insert($stages);
    }
}
