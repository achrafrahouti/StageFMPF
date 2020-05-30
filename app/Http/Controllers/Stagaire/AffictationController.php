<?php

namespace App\Http\Controllers\Stagaire;

use App\Etudiant;
use App\Http\Controllers\Controller;
use App\Niveau;
use App\Service;
use App\Stagaire;
use Illuminate\Http\Request;

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
        if (empty($request->capacite)) {// pour capacite si l'utilisateur pas entrer une valeur
            $serveces=Service::all();
            $capacite=$serveces->min('capacite');
        }
        else{
                    $capacite=$request->capacite;

        }
        $etudiants=$niveau->etudiants->sortBy('prenom')->sortBy('nom');//etudiants sort avec nom et prenom
        $groupes=$niveau->groupes;
        $nbrG=$groupes->count();//nombre de groupes
        $i=0;//compteur pour les stagaire
        $j=0;//pour groupe
        foreach ($etudiants as $etudiant) {
        if ($i==$capacite) {
            $i=0;
            $j++;
        } 
        $stagaire= $etudiant->stagaire; 
        $stagaire->groupe_id=$groupes[$j]->id;
        $stagaire->save();
        // dd($stagaire->groupe_id);
        $i++;
        }
        return view('stagaire.affictation.show',compact('etudiants','niveau'));
    }
}
