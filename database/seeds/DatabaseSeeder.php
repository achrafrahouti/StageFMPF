<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PeriodesSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            ServicesSeeder::class,
            EtudiantSeeder::class,
            GroupeSeeder::class,
            StageSeeder::class,
            StagaireSeeder::class,
        ]);
    }
}
