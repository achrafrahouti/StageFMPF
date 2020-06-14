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
        $this->middleware('auth');
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
        return redirect()->route('admin.etudiants.index')->with('create', 'Stagaires ont  été créé');

    }

    public function destroy(Request $request)
    {
        $user=User::find($request->id);
        $stagaire=$user->profile;
        $user->forceDelete();
        $stagaire->delete();
        return back()->with('delete', 'Stagaire a  été supprimé');
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
    public function updatepassword()
    {
          return view('admin.users.updatepassword');
    }
    public function updatep(Request $request) {
          $user=User::find($request->user_id);

        if(!Hash::check($request->password,$user->password)){
               return back()->with('erreur1',"ancien mot de passe est inccorect");
           } 
            elseif(!stristr($request->passwordn,$request->passwordc))
            {
                return back()->with('erreur2',"mot de passe de confirmation est inccorect");
            }
            else{   
                 $hashpass=Hash::make(($request->passwordn));
                 if(Hash::check($request->passwordn,$hashpass));
                 {
                  $user->update(['password'=>$hashpass]);     
                   } 
                   return back()->with('success','Mot de passe a été bien modifié');
            }
          
    }
}
