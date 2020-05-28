<?php

use App\Groupe;
use Illuminate\Database\Seeder;

class GroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

                    $groupes=[
                        [
                        'id'=>1,
                        'name'=>'G 1.1.1',
                        'groupe_tot'=>'1',
                        'niveau_id'=>'1',
                        'groupe_sh'=>'1',
                        'groupe_sgh'=>'1',
                        ],
                        [
                        'id'=>2,
                        'name'=>'G 1.1.2',
                        'groupe_tot'=>'1',
                        'niveau_id'=>'1',
                        'groupe_sh'=>'1',
                        'groupe_sgh'=>'2',
                        ],
                        [
                        'id'=>3,
                        'name'=>'G 1.2.3',
                        'groupe_tot'=>'1',
                        'niveau_id'=>'1',
                        'groupe_sh'=>'2',
                        'groupe_sgh'=>'3',
                        ],
                        [
                        'id'=>4,
                        'name'=>'G 1.2.4',
                        'groupe_tot'=>'1',
                        'niveau_id'=>'1',
                        'groupe_sh'=>'2',
                        'groupe_sgh'=>'4',
                        ],
                        [
                        'id'=>'5',
                        'name'=>'G 2.1.1',
                        'groupe_tot'=>'2',
                        'niveau_id'=>'2',
                        'groupe_sh'=>'1',
                        'groupe_sgh'=>'1',
                        ],
                        [
                        'id'=>'6',
                        'name'=>'G 2.1.2',
                        'groupe_tot'=>'2',
                        'niveau_id'=>'2',
                        'groupe_sh'=>'1',
                        'groupe_sgh'=>'2',
                        ],
                        [
                        'id'=>'7',
                        'name'=>'G 2.2.3',
                        'groupe_tot'=>'2',
                        'niveau_id'=>'2',
                        'groupe_sh'=>'2',
                        'groupe_sgh'=>'3',
                        ],
                        [
                        'id'=>'8',
                        'name'=>'G 2.2.4',
                        'groupe_tot'=>'2',
                        'niveau_id'=>'2',
                        'groupe_sh'=>'2',
                        'groupe_sgh'=>'4',
                        ],     
                    ];
                    Groupe::insert($groupes);

    }
}
