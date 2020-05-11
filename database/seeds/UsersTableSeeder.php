<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$imU.Hdz7VauIT3LIMCMbsOXvaaTQg6luVqkhfkBcsUd.SJW2XSRKO',
            'remember_token' => null,
            'created_at'     => '2019-04-15 19:13:32',
            'updated_at'     => '2019-04-15 19:13:32',
            'deleted_at'     => null,
        ],
        [
            'id'             => 2,
            'name'           => 'Etudiant',
            'email'          => 'etudiant@etudiant.com',
            'password'       => Hash::make('password'),
            'remember_token' => null,
            'created_at'     => '2019-04-15 19:13:32',
            'updated_at'     => '2019-04-15 19:13:32',
            'deleted_at'     => null,
        ],
        [
            'id'             => 3,
            'name'           => 'Secretaire',
            'email'          => 'secretaire@secretaire.com',
            'password'       => Hash::make('password'),
            'remember_token' => null,
            'created_at'     => '2019-04-15 19:13:32',
            'updated_at'     => '2019-04-15 19:13:32',
            'deleted_at'     => null,
        ],
        [
            'id'             => 4,
            'name'           => 'Encadrant',
            'email'          => 'encadrant@encadrant.com',
            'password'       => Hash::make('password'),
            'remember_token' => null,
            'created_at'     => '2019-04-15 19:13:32',
            'updated_at'     => '2019-04-15 19:13:32',
            'deleted_at'     => null,
        ],
    ];

        User::insert($users);
    }
}
