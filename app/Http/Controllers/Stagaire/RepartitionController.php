<?php

namespace App\Http\Controllers\Stagaire;

use App\Groupe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Niveau;
use App\Periode;
use App\Stage;

class RepartitionController extends Controller
{
    public function choix()
    {
        
        $niveaux=Niveau::all();

        return view('stagaire.repartition.choix',compact('niveaux'));
    }

    /**
     * 
     * 
     * 
     */
    public function repartir(Request $request)
    {
        $stages=Stage::where('niveau_id',$request->niveau_id)->get();
        $groupes=Groupe::where('niveau_id',$request->niveau_id)->get();
        $periodes=Periode::where('niveau_id',$request->niveau_id)->get();
        return view('stagaire.repartition.repartir',compact('stages','groupes','periodes'));
        dd($stages,$groupes,$periodes);
    }

    public function partitionner(Request $request)
    {


        $periode=Periode::where('id',$request->periode_id)->first();
        $stage=Stage::where('id',$request->stage_id)->first();
        $groupes=$request->groupes;
        foreach($groupes as $groupe)
        {
            $periode->stages()->attach($stage->id,['groupe_id'=>$groupe]);
        }

        return view('stagaire.repartition.show');
    }
    
}
