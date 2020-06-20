<?php

use App\Admin;
use App\Encadrant;
use App\Secretaire;
use Illuminate\Database\Seeder;

class SecretaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Sectretaire
         */
        $secretaire=[
            [
            'id'=>1,
            'nom'=>'Abdo',
            'prenom'=>'Rahou',
            'service_id'=>'6',
            'created_at'     => '2019-04-15 19:13:32',
            'updated_at'     => '2019-04-15 19:13:32',

            ],
    ];
    Secretaire::insert($secretaire);

    /**
     * Encadrant
     */
    $encadrant=[
        [
            'id'=>1,
            'nom'=>'Achraf',
            'prenom'=>'Rahou',
            'service_id'=>'6',
            'created_at'     => '2019-04-15 19:13:32',
            'updated_at'     => '2019-04-15 19:13:32',

            ],        [
            'id'=>2,
            'nom'=>'Achraf',
            'prenom'=>'Rahou',
            'service_id'=>'2',
            'created_at'     => '2019-04-15 19:13:32',
            'updated_at'     => '2019-04-15 19:13:32',

            ],
            [
                'id'=>3,
                'nom'=>'Achraf',
                'prenom'=>'Rahou',
                'service_id'=>'3',
                'created_at'     => '2019-04-15 19:13:32',
                'updated_at'     => '2019-04-15 19:13:32',
    
            ],
            [
                'id'=>4,
                'nom'=>'Achraf',
                'prenom'=>'Rahou',
                'service_id'=>'4',
                'created_at'     => '2019-04-15 19:13:32',
                'updated_at'     => '2019-04-15 19:13:32',
    
            ],
            [
                'id'=>5,
                'nom'=>'Achraf',
                'prenom'=>'Rahou',
                'service_id'=>'5',
                'created_at'     => '2019-04-15 19:13:32',
                'updated_at'     => '2019-04-15 19:13:32',
    
            ],
            [
                'id'=>6,
                'nom'=>'Achraf',
                'prenom'=>'Rahou',
                'service_id'=>'1',
                'created_at'     => '2019-04-15 19:13:32',
                'updated_at'     => '2019-04-15 19:13:32',
    
                ],
    ];
         Encadrant::insert($encadrant);


         /**
          * Admin
          */
        $admin=[
            [
                'id'=>1,
                'nom'=>'Adil',
                'prenom'=>'Admin',
                'created_at'     => '2019-04-15 19:13:32',
                'updated_at'     => '2019-04-15 19:13:32',
    
                ],
        ];
        Admin::insert($admin);

        
    }
}
