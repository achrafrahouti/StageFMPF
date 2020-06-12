<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Encadrant;
use App\Etudiant;
use App\Secretaire;
use App\Service;
use App\Stagaire;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index()
    {
        abort_unless(\Gate::allows('user_access'), 403);

        $users = User::whereNotIn('profile_type',['App\Stagaire'])->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('user_create'), 403);

        $roles = Role::all()->pluck('title', 'id');
        $services=Service::all();

        return view('admin.users.create', compact(['roles','services']));
    }

    public function store(Request $request)
    {
        abort_unless(\Gate::allows('user_create'), 403);
        if($request->roles[0]==4)
        {   $encadrant=Encadrant::create($request->except(['email','password']));
            $user=User::create($request->only(['email','password']));
            $user->profile_type="App\Encadrant";
            $user->profile_id=$encadrant->id;
            $user->save();
            $user->roles()->sync($request->input('roles', []));
            
        }
        elseif ($request->roles[0]==3) {
            $secretaire=Secretaire::create($request->only(['nom','prenom','service_id']));
            $user=User::create($request->only(['email','password']));
            $user->profile_type="App\Secretaire";
            $user->profile_id=$secretaire->id;
            $user->save();
            $user->roles()->sync($request->input('roles', []));
            
        }
        elseif ($request->roles[0]==1) {
            $admin=Admin::create($request->only(['nom','prenom','service_id']));
            $user=User::create($request->only(['email','password']));
            $user->profile_type="App\Admin";
            $user->profile_id=$admin->id;
            $user->save();
            $user->roles()->sync($request->input('roles', []));
            
        }

        

        return redirect()->route('admin.users.index')->with('create', 'User Created');
    }

    public function edit(User $user)
    {
        abort_unless(\Gate::allows('user_edit'), 403);

        $roles = Role::all()->pluck('title', 'id');

        $user->load('roles');

        return view('admin.users.edit', compact('roles', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        abort_unless(\Gate::allows('user_edit'), 403);

        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index')->with('update', 'User Updated');
    }

    public function show(User $user)
    {
             abort_unless(\Gate::allows('user_show'), 403);

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        abort_unless(\Gate::allows('user_delete'), 403);


       
        if($user->profile_type=="App\Encadrant")
        {
            $profile_id=$user->profile_id;
            $user->forceDelete();
            $encadrant=Encadrant::find($profile_id);
            $encadrant->delete();      
        }
        elseif ($user->profile_type=="App\Secretaire") 
        {
            $profile_id=$user->profile_id;
            $user->forceDelete();
            $secretaire=Secretaire::find($profile_id);
            $secretaire->delete();  
        }
        else
        {
            $profile_id=$user->profile_id;
            $user->forceDelete();
            $admin=Admin::find($profile_id);
            $admin->delete();  
        }
    
        return back()->with('delete', 'User Deleted');
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }

    public function storeStagaire()
    {
        $stagaires_ids=Stagaire::all()->pluck('etudiant_id');
        $etudiants=Etudiant::whereNotIn('id',$stagaires_ids)->get();
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
            $user->save();
        }
    }
}
