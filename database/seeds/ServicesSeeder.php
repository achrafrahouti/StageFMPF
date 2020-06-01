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
                'capacite'   => '14',
                'lieu'       => 'CHU FES',
                // 'secretaire_id'=>'1',
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '2',
                'name'       => 'MC Interne',
                'capacite'   => '20',
                'lieu'       => 'CHU FES',
                // 'secretaire_id'=>null,
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '3',
                'name'       => 'Pshycho',
                'capacite'   => '15',
                'lieu'       => 'CHU FES',
                // 'secretaire_id'=>null,
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '4',
                'name'       => 'Urgance',
                'capacite'   => '16',
                'lieu'       => 'CHU FES',
                // 'secretaire_id'=>null,
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '5',
                'name'       => 'LAbo',
                'capacite'   => '30',
                'lieu'       => 'CHU FES',
                // 'secretaire_id'=>null,
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
            [
                'id'         => '6',
                'name'       => 'Chirurgie',
                'capacite'   => '18',
                'lieu'       => 'CHU FES',
                // 'secretaire_id'=>null,
                'created_at' => '2019-04-15 19:14:42',
                'updated_at' => '2019-04-15 19:14:42',
            ],
        ];
        Service::insert($services);
    }
}
