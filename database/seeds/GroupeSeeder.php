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
                            'id'=>'1',
                            'name'=>'G 1.1.1',
                            'groupe_tot'=>'1',
                            'niveau_id'=>'1',
                            'groupe_sh'=>'1',
                            'groupe_sgh'=>'1',
                            ],
                            [
                            'id'=>'2',
                            'name'=>'G 1.1.2',
                            'groupe_tot'=>'1',
                            'niveau_id'=>'1',
                            'groupe_sh'=>'1',
                            'groupe_sgh'=>'2',
                            ],
                            [
                            'id'=>'3',
                            'name'=>'G 1.2.3',
                            'groupe_tot'=>'1',
                            'niveau_id'=>'1',
                            'groupe_sh'=>'2',
                            'groupe_sgh'=>'3',
                            ],
                            [
                            'id'=>'4',
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
                            'niveau_id'=>'1',
                            'groupe_sh'=>'1',
                            'groupe_sgh'=>'1',
                            ],
                            [
                            'id'=>'6',
                            'name'=>'G 2.1.2',
                            'groupe_tot'=>'2',
                            'niveau_id'=>'1',
                            'groupe_sh'=>'1',
                            'groupe_sgh'=>'2',
                            ],
                            [
                            'id'=>'7',
                            'name'=>'G 2.2.3',
                            'groupe_tot'=>'2',
                            'niveau_id'=>'1',
                            'groupe_sh'=>'2',
                            'groupe_sgh'=>'3',
                            ],
                            [
                            'id'=>'8',
                            'name'=>'G 2.2.4',
                            'groupe_tot'=>'2',
                            'niveau_id'=>'1',
                            'groupe_sh'=>'2',
                            'groupe_sgh'=>'4',
                            ], 
                            [
                            'id'=>'9',
                            'name'=>'G 3.1.1',
                            'groupe_tot'=>'3',
                            'niveau_id'=>'1',
                            'groupe_sh'=>'1',
                            'groupe_sgh'=>'1',
                            ],
                            [
                            'id'=>'10',
                            'name'=>'G 3.1.2',
                            'groupe_tot'=>'3',
                            'niveau_id'=>'1',
                            'groupe_sh'=>'1',
                            'groupe_sgh'=>'2',
                            ],
                            [
                            'id'=>'11',
                            'name'=>'G 3.2.3',
                            'groupe_tot'=>'3',
                            'niveau_id'=>'1',
                            'groupe_sh'=>'2',
                            'groupe_sgh'=>'3',
                            ],
                            [
                            'id'=>'12',
                            'name'=>'G 3.2.4',
                            'groupe_tot'=>'3',
                            'niveau_id'=>'1',
                            'groupe_sh'=>'2',
                            'groupe_sgh'=>'4',
                            ],
                            [
                            'id'=>'13',
                            'name'=>'G 1.1.1',
                            'groupe_tot'=>'1',
                            'niveau_id'=>'2',
                            'groupe_sh'=>'1',
                            'groupe_sgh'=>'1',
                            ],
                            [
                            'id'=>'14',
                            'name'=>'G 1.1.2',
                            'groupe_tot'=>'1',
                            'niveau_id'=>'2',
                            'groupe_sh'=>'1',
                            'groupe_sgh'=>'2',
                            ],
                            [
                            'id'=>'15',
                            'name'=>'G 1.2.3',
                            'groupe_tot'=>'1',
                            'niveau_id'=>'2',
                            'groupe_sh'=>'2',
                            'groupe_sgh'=>'3',
                            ],
                            [
                            'id'=>'16',
                            'name'=>'G 1.2.4',
                            'groupe_tot'=>'1',
                            'niveau_id'=>'2',
                            'groupe_sh'=>'2',
                            'groupe_sgh'=>'4',
                            ],
                            [
                            'id'=>'17',
                            'name'=>'G 2.1.1',
                            'groupe_tot'=>'2',
                            'niveau_id'=>'2',
                            'groupe_sh'=>'1',
                            'groupe_sgh'=>'1',
                            ],
                            [
                            'id'=>'18',
                            'name'=>'G 2.1.2',
                            'groupe_tot'=>'2',
                            'niveau_id'=>'2',
                            'groupe_sh'=>'1',
                            'groupe_sgh'=>'2',
                            ],
                            [
                            'id'=>'19',
                            'name'=>'G 2.2.3',
                            'groupe_tot'=>'2',
                            'niveau_id'=>'2',
                            'groupe_sh'=>'2',
                            'groupe_sgh'=>'3',
                            ],
                            [
                            'id'=>'20',
                            'name'=>'G 2.2.4',
                            'groupe_tot'=>'2',
                            'niveau_id'=>'2',
                            'groupe_sh'=>'2',
                            'groupe_sgh'=>'4',
                            ], 
                            [
                            'id'=>'21',
                            'name'=>'G 3.1.1',
                            'groupe_tot'=>'3',
                            'niveau_id'=>'2',
                            'groupe_sh'=>'1',
                            'groupe_sgh'=>'1',
                            ],
                            [
                            'id'=>'22',
                            'name'=>'G 3.1.2',
                            'groupe_tot'=>'3',
                            'niveau_id'=>'2',
                            'groupe_sh'=>'1',
                            'groupe_sgh'=>'2',
                            ],
                            [
                            'id'=>'23',
                            'name'=>'G 3.2.3',
                            'groupe_tot'=>'3',
                            'niveau_id'=>'2',
                            'groupe_sh'=>'2',
                            'groupe_sgh'=>'3',
                            ],
                            [
                            'id'=>'24',
                            'name'=>'G 3.2.4',
                            'groupe_tot'=>'3',
                            'niveau_id'=>'2',
                            'groupe_sh'=>'2',
                            'groupe_sgh'=>'4',
                            ], 
                            
                    ];
                    Groupe::insert($groupes);

    }
}
