<?php

namespace App\Http\Controllers\Stagaire;

use App\Groupe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stagaire;
use App\Stage;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{


    public function __invoke()
    {
        
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
        // dd($user);
        return view('stagaire.notes.index',compact('user'));
    }

    public function choix()
    {
        $groupes=Groupe::all();
        $stages=Auth::user()->profile->service->stages;
        return view('stagaire.notes.choix',compact('groupes','stages'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $groupe=$request['groupe'];
        $user=Auth::user();
        $stage=Stage::where('id',$request['stage'])->first();
        $stagaires=Stagaire::where('groupe_id',$groupe)->get();
        return view('stagaire.notes.create',compact('stage','stagaires'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Authurize
         * 
         */
        
        $stage=Stage::where('id',$request->stage)->first()->id;
        $stagaires=Stagaire::find($request->groupe);
        
       foreach ($stagaires as  $stagaire) {
           $note=$request->notes[$stagaire->id];
           $stagaire->stages()->syncWithoutDetaching([$stage=>['note'=>$note]]);
        }   
        /**
         * reste feedback
         */
        return redirect(route('stagaire.notes.choix'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
