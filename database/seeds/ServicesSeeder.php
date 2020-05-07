<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services=[
            [
                'id'         => '1',
                'name'       => 'Radiologie',
                'capacite'   => '12',
                'lieu'       => 'CHU FES',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '2',
                'name'       => 'MC Interne',
                'capacite'   => '20',
                'lieu'       => 'CHU FES',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '3',
                'name'       => 'Pshycho',
                'capacite'   => '1',
                'lieu'       => 'CHU FES',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
        ];
        Service::insert($services);
    }
}
