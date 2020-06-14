<?php
namespace App\Http\Controllers\stagaire;
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
use Carbon\Carbon;
use PDF;
class DemandeController extends Controller
{
    public function index()
    {
        // abort_unless(\Gate::allows('demande_access'), 403);

        $demandes= Auth::user()->profile->demandes;

        return view('stagaire.demandes.index', compact('demandes'));
    }

    public function create()
    {
        // abort_unless(\Gate::allows('demande_create'), 403);
        // $niveau_id=Auth::user()->profile->etudiant->niveau_id;
        // $stages=Stage::where('niveau_id',$niveau_id)->get();
          $stagaire=Auth::user()->profile;
          $groupe=$stagaire->groupe;
          $stagearr=DB::table('stage_groupe_periode')->where('groupe_id',$groupe->id)->get()->pluck('stage_id')->toArray();
          $stages=Stage::whereIn('id',$stagearr)->get();
        return view('stagaire.demandes.create',compact('stages'));
    }

    public function store(StoreDemandeRequest $request)
    { 
        // abort_unless(\Gate::allows('demande_create'), 403);
        $stage=Stage::where('id',$request->id_stage)->get();
        $stagaire=Stagaire::where('id',$request->id_stagaire)->first();
        $periode_id=DB::table('stage_groupe_periode')->where('stage_id',$request->id_stage)->where('groupe_id',$stagaire->groupe_id)->select('periode_id')->first();
         $periode=Periode::where('id',$periode_id->periode_id)->first();         
          $date_debut=Carbon::parse( $periode->date_debut);
          $now=Carbon::now();
         if(stristr($request->type_dem,"Transfert")||stristr($request->type_dem,"Revalidation")){
         if($date_debut->diffInDays($now)>=10){
             $Demande = Demande::create($request->all());
              return redirect()->route('stagaire.demandes.index')->with('success',"Votre demande a été bien crée");
            }
            else{

                return redirect()->route('stagaire.demandes.index')->with('danger',"La date de la depot de demande a été depassé!");
            }
       }
       if(stristr($request->type_dem,"Reclamtion")){
         $stagaire_id=Auth::user()->profile->id;
         $stage_id=$request->id_stage;
         $verify=DB::table('notes')->where('stage_id',$stage_id)->where('stagaire_id',$stagaire_id)->first()->verify;
         if($verify)
         {
             $Demande = Demande::create($request->all());
              return redirect()->route('stagaire.demandes.index')->with('success',"Votre demande a été bien crée");
         }
         else{
            return redirect()->route('stagaire.demandes.index')->with('dangerr',"La note de ce stage n'est pas encore afficher!");
         }

       }

    }

    public function edit(Demande $demande)
    {
        // abort_unless(\Gate::allows('demande_edit'), 403);
        $stages=Stage::all();
        return view('stagaire.demandes.edit', compact('demande','stages'));
    }

    public function update(UpdateDemandeRequest $request, Demande $demande)
    {
        // abort_unless(\Gate::allows('demande_edit'), 403);
    if(is_null($demande->demande_validé))
    {
        $demande->update($request->all());
        return redirect()->route('stagaire.demandes.index')->with('updatesuccess',"Votre demande a été bien modifié");
    }
}

    public function show(Demande $demande)
    {
        // abort_unless(\Gate::allows('demande_show'), 403);

        return view('stagaire.demandes.show', compact('demande'));
    }

    public function destroy(Demande $demande)
    {
        abort_unless(\Gate::allows('demande_delete'), 403);

        $demande->delete();

        return back();
    }

    public function massDestroy(MassDestroyDemandeRequest $request)
    {
        Demande::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    } 


    public function print($id)
    {   $stage=Stage::where('id',$id)->first();
        $user=Auth::user();
        $stagaire=$user->profile;
        $verify=DB::table('notes')->where('stagaire_id',$stagaire->id)->where('stage_id',$stage->id)->first();
        // return view('stagaire.notes.attestation', compact('stagaire','stage'));
        $pdf = \PDF::loadView('stagaire.notes.attestation', compact('stagaire','stage'));
        
        return $pdf->download('Attestaion.pdf');
    }
}

