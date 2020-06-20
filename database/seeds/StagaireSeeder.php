<?php

use App\Etudiant;
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

        $stagaires1=[
            [
                'id'=> '1',
                'etudiant_id'=>'1',
                'groupe_id'=>'13'
            ],
            [
                'id'=> '2',
                'etudiant_id'=>'2',
                'groupe_id'=>'13'
            ],
            [
                'id'=> '3',
                'etudiant_id'=>'3',
                'groupe_id'=>'14'
            ],
            [
                'id'=> '4',
                'etudiant_id'=>'4',
                'groupe_id'=>'14'
            ],
            [
                'id'=> '5',
                'etudiant_id'=>'5',
                'groupe_id'=>'15'
            ],
            [
                'id'=> '6',
                'etudiant_id'=>'6',
                'groupe_id'=>'15'
            ],
            [
                'id'=> '7',
                'etudiant_id'=>'7',
                'groupe_id'=>'16'
            ],
            [
                'id'=> '8',
                'etudiant_id'=>'8',
                'groupe_id'=>'16'
            ],
            [
                'id'=> '9',
                'etudiant_id'=>'9',
                'groupe_id'=>'17'
            ],
            [
                'id'=> '10',
                'etudiant_id'=>'10',
                'groupe_id'=>'17'
            ],
            ];
            Stagaire::insert($stagaires1);

            // $etudiants=Etudiant::where('niveau_id',2)->where('id',1)->get();
            // foreach ($etudiants as  $etudiant) {
            //     $stagaires['etudiant_id']=$etudiant->id;
            //     Stagaire::insert($stagaires);

            // }
            // sync stages with stagairin      Stagaire::insert($stagaires);
            $stagaires=Stagaire::all();
            foreach ($stagaires as $stagaire) {
                $stagaire->stages()->attach([1 ,2 ,3 ,4 ,]);
            }
    }
}
