<?php

namespace App\Http\Controllers\Stagaire;

use App\Etudiant;
use App\Http\Controllers\Controller;
use App\Niveau;
use App\Service;
use App\Stagaire;
use App\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AffictationController extends Controller
{
    public function index()
    {
        $niveaux=Niveau::all();
        return view('stagaire.affictation.index',compact('niveaux'));
    }
    public function store(Request $request)
    {
        $niveau=Niveau::where('id',$request->niveau_id)->first();//Niveau

        // if (empty($request->capacite)) {// pour capacite si l'utilisateur n' a pas entré une valeur
        //     $service=Service::all();
        //     $capacite=$service->min('capacite');

        if (empty($request->capacite)) {// pour capacite si l'utilisateur pas entrer une valeur
            $capacite=10000;
            $stages=Stage::where('niveau_id',$request->niveau_id)->get();
            foreach ($stages as  $stage) {
                if($capacite > $stage->service->capacite){
                    $capacite=$stage->service->capacite;
                }
            }
        }
        else{
                    $capacite=$request->capacite;

        }
        $etudiants=$niveau->etudiants->sortBy('prenom')->sortBy('nom');//etudiants ordoner  par nom et prenom
        $groupes=$niveau->groupes;
        $nbrG=$groupes->count();//nombre de groupes
        $i=0;//compteur pour les stagaire
        $j=0;// compteur pour groupe
        foreach ($etudiants as $etudiant) {
        if ($i==$capacite) {
            $i=0;
            $j++;
        } 
        $stagaire= $etudiant->stagaire; 
        $stagaire->groupe_id=$groupes[$j]->id;
        $stagaire->save();
        $i++;
        }
        return view('stagaire.affictation.show',compact('etudiants','niveau'));
    }
}
