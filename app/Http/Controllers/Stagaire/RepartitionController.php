<?php

namespace App\Http\Controllers\Stagaire;

use App\Groupe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Niveau;
use App\Periode;
use App\Stage;
use Illuminate\Support\Facades\DB;

class RepartitionController extends Controller
{
    public function choix()
    {
        
        $niveaux=Niveau::all();
        return view('stagaire.repartition.choix',compact('niveaux'));
;
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
        $periodes=Periode::all();

        foreach($groupes as $groupe)
        {
            $periode->stages()->attach($stage->id,['groupe_id'=>$groupe]);
        }
        $this->repartition($periode->id,$groupes,$stage->id);

        /** synchronser les stagaire avec stage
         * 
         * 
         */
        return redirect()->route('stagaire.repartition.index');

    }

    public function index()
    {
        $periodes=Periode::all();
        return view('stagaire.repartition.show',compact('periodes'));

    }

    public function repartition($periode_sync,array $groupes_sync,$stage_sync)
    {
       $periode=Periode::where('id',$periode_sync)->first(); //Periode pour id et niveau
       $niveau_id=$periode->niveau_id;
        $periodes=Periode::where('niveau_id',$niveau_id)->whereNotIn('id',[$periode->id])->get();//touts les periodes sauf periode entrer
        $sgh = array();
        for($i=0;$i<count($groupes_sync);$i++)
        {
            $groupe=Groupe::find($groupes_sync[$i]);
            array_push($sgh,$groupe->groupe_sgh);
        }
        $groupe_tot=$groupe->groupe_tot;

        $maxG_tot=Groupe::max('groupe_tot');

        $key_tot=$groupe_tot;
        if ($key_tot==$maxG_tot) {
            $key_tot=0;
        }
        foreach ($periodes as  $periode) {
            $key_tot++;
            if($key_tot==$groupe_tot)
            {
                return ;
            }
            if($key_tot==$maxG_tot+1){
                $key_tot=1;
            }
                $groupes=DB::table('groupes')->where('niveau_id',$niveau_id)->where('groupe_tot',$key_tot)->whereIn('groupe_sgh',$sgh)->get();
                $arrayGroupes=$groupes->toArray();
                $key=0;
            for ($j=0; $j < count($sgh); $j++) {

                 $periode->stages()->attach($stage_sync,['groupe_id'=>$arrayGroupes[$key]->id]);
                 $key++;

            }

        }

    }
    
}
