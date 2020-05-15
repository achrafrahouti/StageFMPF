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
                        'name'=>'Groupe 1',
                        'groupe_tot'=>'1',
                        'groupe_sh'=>'1',
                        'groupe_sgh'=>'1',
                        ],
                        [
                        'id'=>2,
                        'name'=>'Groupe 2',
                        'groupe_tot'=>'1',
                        'groupe_sh'=>'1',
                        'groupe_sgh'=>'2',
                        ],
                        [
                        'id'=>3,
                        'name'=>'Groupe 3',
                        'groupe_tot'=>'1',
                        'groupe_sh'=>'2',
                        'groupe_sgh'=>'3',
                        ],
                        [
                        'id'=>4,
                        'name'=>'Groupe 4',
                        'groupe_tot'=>'1',
                        'groupe_sh'=>'2',
                        'groupe_sgh'=>'4',
                        ],
                        [
                        'id'=>'5',
                        'name'=>'Groupe 5',
                        'groupe_tot'=>'2',
                        'groupe_sh'=>'1',
                        'groupe_sgh'=>'1',
                        ],
                        [
                        'id'=>'6',
                        'name'=>'Groupe 6',
                        'groupe_tot'=>'2',
                        'groupe_sh'=>'1',
                        'groupe_sgh'=>'2',
                        ],
                        [
                        'id'=>'7',
                        'name'=>'Groupe 7',
                        'groupe_tot'=>'2',
                        'groupe_sh'=>'2',
                        'groupe_sgh'=>'3',
                        ],
                        [
                        'id'=>'8',
                        'name'=>'Groupe 8',
                        'groupe_tot'=>'2',
                        'groupe_sh'=>'2',
                        'groupe_sgh'=>'4',
                        ],     
                    ];
                    Groupe::insert($groupes);

    }
}
