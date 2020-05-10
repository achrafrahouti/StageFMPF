<?php

use App\Stagaire;
use Illuminate\Database\Seeder;

class StagaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stagaires=[
            [
                'id'=> '1',
                'etudiant_id'=>'1',
                'groupe_id'=>'1'
            ],
            [
                'id'=> '2',
                'etudiant_id'=>'2',
                'groupe_id'=>'1'
            ],
            [
                'id'=> '3',
                'etudiant_id'=>'3',
                'groupe_id'=>'2'
            ],
            [
                'id'=> '4',
                'etudiant_id'=>'4',
                'groupe_id'=>'2'
            ],
            [
                'id'=> '5',
                'etudiant_id'=>'5',
                'groupe_id'=>'3'
            ],
            [
                'id'=> '6',
                'etudiant_id'=>'6',
                'groupe_id'=>'3'
            ],
            ];

            // sync stages with stagaire and insert notes
            Stagaire::insert($stagaires);
            $stagaires=Stagaire::all();
            foreach ($stagaires as $stagaire) {
                $stagaire->stages()->attach([
                    1 => ['note' => 12],
                    2 => ['note' => 13],
                    3 => ['note' => 14],
                    4 => ['note' => 15],
                ]);
            }
    }
}
