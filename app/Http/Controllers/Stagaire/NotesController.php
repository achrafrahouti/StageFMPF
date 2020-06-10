<?php

namespace App\Http\Controllers\Stagaire;

use App\Groupe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotesRequest;
use App\Stagaire;
use App\Stage;
use Illuminate\Support\Facades\Auth;

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
        // dd($request);
        $stage=Stage::where('id',$request->stage)->first()->id;
        $stagaires=Stagaire::find($request->stagaire_id);
        
       foreach ($stagaires as  $stagaire) {
           $note=$request->notes[$stagaire->id];
           $stagaire->stages()->syncWithoutDetaching([$stage=>['note'=>$note]]);
        }   
        /**
         * reste feedback
         */
        return redirect()->route('notes.ajax')->with('succes','Les Notes sont Inséré ');
    }

    
}
