<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'         => '1',
                'title'      => 'user_management_access',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '17',
                'title'      => 'periode_create',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '18',
                'title'      => 'periode_edit',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '19',
                'title'      => 'periode_show',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '20',
                'title'      => 'periode_delete',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '21',
                'title'      => 'periode_access',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '22',
                'title'      => 'groupe_create',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '23',
                'title'      => 'groupe_edit',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '24',
                'title'      => 'groupe_show',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '25',
                'title'      => 'groupe_delete',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '26',
                'title'      => 'groupe_access',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '27',
                'title'      => 'service_create',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '28',
                'title'      => 'service_edit',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '29',
                'title'      => 'service_show',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '30',
                'title'      => 'service_delete',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '31',
                'title'      => 'service_access',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '32',
                'title'      => 'stage_create',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '33',
                'title'      => 'stage_edit',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '34',
                'title'      => 'stage_show',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '35',
                'title'      => 'stage_delete',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '36',
                'title'      => 'stage_access',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],


              [
                'id'         => '37',
                'title'      => 'demande_create',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '38',
                'title'      => 'demande_edit',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '39',
                'title'      => 'demande_show',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '40',
                'title'      => 'demande_delete',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [
                'id'         => '41',
                'title'      => 'demande_access_etudiant',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [   'id'         => '42',
                'title'      => 'demande_access_admin',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
            ],
            [   'id'         => '43',
                'title'      => 'add_note',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42', 
        ],
            
        ];

        Permission::insert($permissions);
    }
}
