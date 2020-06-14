<?php

namespace App\Http\Controllers\Stagaire;

use App\Groupe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotesRequest;
use App\Stagaire;
use App\Stage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{


    public function __invoke()
    {
        
    }

    public function show()
    {
        return view('stagaire.notes.ajax');
    }

    public function adminajax($niveau_id)
    {
        $stages=Stage::where('niveau_id',$niveau_id)->get();
        $groupes=Groupe::where('niveau_id',$niveau_id)->get();
        $collections['stages']=$stages;
        $collections['groupes']=$groupes;
        return json_encode($collections);
    }

    public function ajax($niveau_id)
    {
        
        $secretaire=Auth::user()->profile;
        $stages=$secretaire->service->stages;
        $groupes=Groupe::where('niveau_id',$niveau_id)->get();
        $collections['stages']=$stages;
        $collections['groupes']=$groupes;
        return json_encode($collections);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $user=Auth::user();
        return view('stagaire.notes.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $stage=Stage::where('id',$request->stage_id)->first();
        $stagaires=Stagaire::where('groupe_id',$request->groupe_id)->get();
        $pluck=$stagaires->pluck('id');
        // groupe_id and stage_id =>
        $s=DB::table('notes')->where('stage_id',$request->stage_id)->whereIn('stagaire_id',$pluck)->get()->count();

        if($s==0){
            return redirect()->route('notes.ajax')->with('error','La repartition n\'est pas encore terminer ');

        }
        return view('stagaire.notes.create',compact('stage','stagaires'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotesRequest $request)
    {
        /**
         * Authurize
         * 
         */
        $stage=Stage::where('id',$request->stage)->first()->id;
        $stagaires=Stagaire::find($request->stagaire_id);
        
       foreach ($stagaires as  $stagaire) {
           $presence=$request->presences[$stagaire->id];
           $motivation=$request->motivations[$stagaire->id];
           $Assiduite=$request->Assiduites[$stagaire->id];
           $integration=$request->integrations[$stagaire->id];
           $connaissance=$request->connaissances[$stagaire->id];
           $note=$presence+$motivation+$Assiduite+$integration+$connaissance;
        // dd($integration);
           $key=DB::table('notes')->select('verify')->where('stagaire_id',$stagaire->id)->where('stage_id',$stage)->first();
           if($key->verify){
            return redirect()->route('notes.ajax')->with('verify','Les notes ont été verifié par l\'encadrant ');
           }
           $stagaire->stages()->syncWithoutDetaching([$stage=>['note'=>$note]]);
           $stagaire->stages()->syncWithoutDetaching([$stage=>['presence'=>$presence]]);
           $stagaire->stages()->syncWithoutDetaching([$stage=>['motivation'=>$motivation]]);
           $stagaire->stages()->syncWithoutDetaching([$stage=>['Assiduite'=>$Assiduite]]);
           $stagaire->stages()->syncWithoutDetaching([$stage=>['integration'=>$integration]]);
           $stagaire->stages()->syncWithoutDetaching([$stage=>['connaissance'=>$connaissance]]);
        }   
        /**
         * reste feedback
         */
        if ($request->isEncadrant) {
                    foreach ($stagaires as  $stagaire) {
            $stagaire->stages()->syncWithoutDetaching([$stage=>['verify'=>true]]);
         }
        }

        return redirect()->route('notes.ajax')->with('succes','Les notes ont  été inséré ');
    }

    
}
