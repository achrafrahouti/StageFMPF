<?php

namespace App\Http\Controllers\Stagaire;

use App\Etudiant;
use App\Groupe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Niveau;
use App\Periode;
use App\Stagaire;
use App\Stage;
use Illuminate\Support\Facades\DB;

class RepartitionController extends Controller
{
 
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request)
    {
        $periodes=Periode::where('niveau_id',$request->niveau_id)->get();
        // dd($periodes);
        $niveaux=Niveau::all();
        return view('stagaire.repartition.show',compact('periodes','niveaux'));
    }

    public function getPeriode($id)
    {

            $periodes = Periode::where('niveau_id', $id)->get(); 
            $niveaux=Niveau::all();
            return view('stagaire.repartition.show',compact('periodes','niveaux'));
        }
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

        $collections['stages']=$stages;
        $collections['periodes']=$periodes;
        $collections['groupes']=$groupes;
        return json_encode($collections);

    } 
 
    public function partitionner(Request $request)
    {
        $this->validate($request,['periode_id'=>'required','groupes'=>'array','groupes.*'=>'required']);
        $periode=Periode::where('id',$request->periode_id)->first();
        $stage=Stage::where('id',$request->stage_id)->first();
        $groupes=$request->groupes;
        $nbrGroupe=Groupe::where('niveau_id',$periode->niveau_id)->distinct('groupe_tot')->count();
        $nbrPeriode=Periode::where('niveau_id',$periode->niveau_id)->count();
        if ($nbrGroupe!=$nbrPeriode) {
            return redirect()->route('stagaire.repartition.show')->with('error','La repartition a été trompé, le nombre des périodes doit égale le nombre des groupes   ');

        }
        $c1=DB::table('stage_groupe_periode')->where('periode_id',$request->periode_id)->where('stage_id',$request->stage_id)->first();
        if (!$c1==null ) {
            return redirect()->route('stagaire.repartition.show')->with('error','La repartition a été trompé,  ');

        }
        foreach($groupes as $groupe)
        {

            $periode->stages()->attach($stage->id,['groupe_id'=>$groupe]);
        }
        $this->repartition($periode->id,$groupes,$stage->id);

        /** synchronser les stagaire avec stage
         * 
         * 
         */
        $niveau_id=$periode->niveau_id;
         return view('stagaire.repartition.index',compact('niveau_id'));
        // return redirect()->route('stagaire.repartition.show')->with('succes','Repartition est terminé avec succés');

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

    public function synch()
    {
        $niveaux=Niveau::all();
        $etudiants=Etudiant::get();
        return view('stagaire.repartition.synch',compact('niveaux','etudiants'));
    }

    public function getStagaires($id)
    {
        $niveaux=Niveau::all();
        $etudiants=Etudiant::where('niveau_id',$id)->get();
        return view('stagaire.repartition.synch',compact('niveaux','etudiants'));
    }

    public function synchroniser()
    {
        $lignes=DB::table('stage_groupe_periode')->get();
        foreach ($lignes as  $ligne) {
            $groupe=Groupe::where('id',$ligne->groupe_id)->first();
            $stagaires=$groupe->stagaires;
            foreach ($stagaires as  $stagaire) {
                $c1=DB::table('notes')->where('stagaire_id',$stagaire->id)->where('stage_id',$ligne->stage_id)->first();
                if ($c1==null) {
                                    $stagaire->stages()->attach($ligne->stage_id);

                }
            }
        }
        return back()->with('succes','Operation a été  terminé avec succes');
    }
    
}
