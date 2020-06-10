<?php
namespace App\Http\Controllers\Admin;
use App\Demande;
use App\Stage; 
use App\Stagaire;
use App\Periode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDemandeRequest;
use App\Http\Requests\StoreDemandeRequest;
use App\Http\Requests\UpdateDemandeRequest;
use Illuminate\Http\Request;


class DemandeController extends Controller
{
    public function index()
    {
        // abort_unless(\Gate::allows('demande_access'), 403);

        $demandes=Demande::all();
        return view('admin.demandes.index', compact('demandes'));
    }
     public function indexv()
    {
        // abort_unless(\Gate::allows('demande_access'), 403);
        $demandes=Demande::all();
        return view('admin.demandes.indexv', compact('demandes'));
    }
    

    public function accepter($id,$bool)
    {
        $demande=Demande::where('id',$id);
        $demande->update(['demande_validé'=>$bool]);
 
        // $demande->save();
    }
  

    public function store($request)
    { 
        
      
    }

    public function edit(Demande $demande)
    {
       
    }

    public function update(UpdateDemandeRequest $request, Demande $demande)
    {
   
     }

    public function show(Demande $demande)
    {
        // abort_unless(\Gate::allows('demande_show'), 403);

        return view('stagaire.demandes.show', compact('demande'));
    }

    public function destroy(Demande $demande)
    {
        // abort_unless(\Gate::allows('demande_delete'), 403);

        $demande->delete();

        return back();
    }

    public function massDestroy(MassDestroyDemandeRequest $request)
    {
        Demande::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    } 
}

