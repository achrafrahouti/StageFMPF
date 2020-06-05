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
    public function repartir( $niveau_id)
    {
        $stages=Stage::where('niveau_id',$niveau_id)->get();
        $groupes=Groupe::where('niveau_id',$niveau_id)->get();
        $periodes=Periode::where('niveau_id',$niveau_id)->get();

        // echo '                <select name="periode_id" id="periode_id" class="form-control select2" >';
        // foreach ($periodes as  $periode) {
        //     echo ' <option value="{{ $periode->id }}">'.$periode->name.'</option>';
        // }
        $collections['stages']=$stages;
        $collections['periodes']=$periodes;
        $collections['groupes']=$groupes;
        return json_encode($collections);
        // return view('stagaire.repartition.repartir',compact('stages','groupes','periodes'));
        // dd($stages,$groupes,$periodes);
    }

    public function partitionner(Request $request)
    {


        $periode=Periode::where('id',$request->periode_id)->first();
        $stage=Stage::where('id',$request->stage_id)->first();
        $groupes=$request->groupes;
        $periodes=Periode::where('niveau_id',$stage->niveau_id)->get();
        foreach($groupes as $groupe)
        {
            $periode->stages()->attach($stage->id,['groupe_id'=>$groupe]);
        }

        return view('stagaire.repartition.show',compact('periodes'));
    }
    
}
