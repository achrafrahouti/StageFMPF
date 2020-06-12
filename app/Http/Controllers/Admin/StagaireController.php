<?php

namespace App\Http\Controllers\Admin;

use App\Etudiant;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\Stagaire;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StagaireController extends Controller
{


    function __construct()
    {
        $this->middleware('role:admin');
    }    

    public function index()
    {
        $stagaires=User::where('profile_type','App\Stagaire')->get();
        return view('admin.stagaires.index',compact('stagaires'));
    }


    public function store()
    {
        $stagaires_ids=Stagaire::all()->pluck('etudiant_id');
        $etudiants=Etudiant::where('niveau_id',1)->whereNotIn('id',$stagaires_ids)->get();
        foreach ($etudiants as $etudiant) {
            $stagaire=Stagaire::create(['etudiant_id'=>$etudiant->id]);
            $cne=$etudiant->cne;
            $password=Hash::make($cne);
            $nom=$etudiant->nom;
            $prenom=$etudiant->prenom;
            $email=$nom.'.'.$prenom.'@usmba.ac.ma';
            $user=User::create(['email'=>$email,'password'=>$password]);
            $user->profile_id=$stagaire->id;
            $user->profile_type='App\Stagaire';
            $role=Role::where('title','Etudiant')->first();
            $user->roles()->sync($role);
            $user->save();
        }
        return redirect()->route('admin.etudiants.index')->with('create', 'User Created');

    }

    public function destroy(Request $request)
    {
        $user=User::find($request->id);
        $stagaire=$user->profile;
        $user->forceDelete();
        $stagaire->delete();
        return back()->with('delete', 'User Deleted');
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        $users=User::whereIn('id',$request->ids)->get();
        foreach ($users as  $user) {
            $stagaire=$user->profile;
            $user->forceDelete();
            $stagaire->delete();
        }
        return response(null, 204);
    }
}
