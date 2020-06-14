@extends('layouts.admin')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@section('content')
@can('update', Model::class)
    
@endcan
    <div class="row">
        <div class="col-lg-12">
            @if (Auth::user()->isEtudiant())
            @php
                        $user=Auth::user()->profile;
                        $groupe=$user->groupe;
                        $stages=$groupe->stages;
                        $arrservices=$stages->pluck('service_id')->toArray();
                        $encadants=App\Encadrant::whereIn('service_id',$arrservices);
                        $demandeA=App\Demande::where('id_stagaire',$user->id)->where('demande_validé',1);
                        $demandeR=App\Demande::where('id_stagaire',$user->id)->where('demande_validé',0);
                        $demandeC=App\Demande::where('id_stagaire',$user->id)->where('demande_validé',null);
            @endphp

   {{--  <div class="card-deck">
                <div class="card border">
                          <div class="card-title text-center">
                               <i class=" badge badge-dark ">Stages</i>
                          </div>
                          <div class="card-body">
                              Nombre des 
                          </div>
                   
                </div>
                 <div class="card border ">
                            <div class="card-title text-center">
                                      <i class="badge badge-danger ">Demandes</i> 
                            </div>
                </div>
                <div class="card border">
                          <div class="card-title text-center">
                               <i class="badge badge-primary ">Périodes</i>
                          </div>
                </div>
      </div>
  </div> --}}
<div class="card">
  <table class="table table-bordered" style='font-family: "Comic Sans MS", cursive, sans-serif;'>
    <tr>
         <th> 
            <div class="card pr-4 pl-4 mt-3" style="background-color:#ea3131; color:white;"> 
        
                               <p>Gestion des stages</p>
            </div>
         </th>
               
        <th>
               <div class="card pr-4 pl-4 mt-3" style="background-color:#1546a0;color:white;">
                
                         <p>Gestion des demandes</p>  
                           
                </div>
        </th>   
            <th>
               <div class="card pr-4 pl-4 mt-3" style="background:#127a17;color:white;">
                           
                                    <p>Gestion des encadants</p> 
                            
                </div>
        </th> 
    </tr>
    <tr>
        <td>
           <div class="card pr-4 pl-4 mt-3"  style="background-color:#ea3131;color:white;"> 

                               <div class="d-inline"><p>Stages</span> <i class="badge badge-dark">{{$stages->count()}}</i>  <span class="float-right fas fa-stethoscope py-2 pl-2"></span></div> 
                 
            </div>
        </td>
        <td>
            <div class="card pr-4 pl-4 mt-3" style="background-color:#1546a0;color: white;"> 
                
                               <div class="d-inline"><p>Demandes acceptées</span> <i class="badge badge-success">{{$demandeA->count()}}</i>  <span class="float-right fas fa-check py-2 pl-2"></span></div> 
                
            </div>
              <div class="card pr-4 pl-4 mt-3" style="background-color:#1546a0;color:white;"> 
                                            
                                               <div class="d-inline"><p>Demandes réfusées</span> <i class="badge badge-danger">{{$demandeR->count()}}</i>  <span class="float-right fas fa-close py-2 pl-2"></span></div> 
              </div>
              <div class="card pr-4 pl-4 mt-3" style="background-color:#1546a0;color:white;"> 
                                            
                                               <div class="d-inline"><p>Demandes en cours</span> <i class="badge badge-dark">{{$demandeC->count()}}</i>  <span class="float-right fas fa-eye-slash py-2 pl-2"></span></div> 
             </div>

        </td>
        <td>
            <div class="card pr-4 pl-4 mt-3 " style="background:#127a17;color:white;"> 
                             
                               <div class="d-inline"><p>Encadrants</span> <i class="badge  badge-dark">{{$encadants->count()}}</i>  <span class="float-right fas fa-medkit py-2 pl-2"></span></div> 
                  
            </div>
        </td>
    </tr>  
  </table>
  </div>
  <div class="card">
                <div class="card-title" style="background-color:#1546a0;color:white;">
                    <h3 class="card-text text-center text-black text-xl">{{ trans('global.cursus.title') }}</h3>
                </div>
                <div class="card-body d-flex">
                <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover  text-center  ">
                            
                                <tr>
                                    <th>
                                        {{ trans('global.stage.title_singular') }}
                                    </th>  
                                    <th >
                                        {{ trans('global.periode.title_singular') }}
                                    </th>
                                     <th>
                                       Service
                                    </th>
                                    <th >
                                        {{ trans('global.periode.fields.date_debut') }}
                                    </th>
                                    <th >
                                        {{ trans('global.periode.fields.date_fin') }}
                                   </th>
                                   
                                </tr>        
                                @foreach ($stages   as $stage)
                                <tr data-entry-id="{{ $stage->id }}">
                                    @php
                                            $periode_id=$stage->pivot->periode_id ;
                                           $periode=App\Periode::find($periode_id);
                                    @endphp

                                    <td >
                                       <i class="badge badge-primary">{{ $stage->name ?? ''}}</i> 
                                    </td>
                                    <td >
                                        <i class="badge badge-info">{{ $periode->name ?? ''}}</i>
                                    </td>
                                    <td>
                                       <i class="badge badge-warning">{{$stage->service->name}} </i> 
                                    </td>
                                    <td>
                                        <i  class="badge badge-dark">{{ $periode->date_debut ?? '' }}</i>
                                    </td>
                                    <td >
                                        <i class="badge badge-danger">{{ $periode->date_fin ?? '' }}</i>
                                    </td>   
                                 </tr>
                                @endforeach  
             </table>    
     </div>
</div>   


 {{-- <div class="card-deck">
             <div class="card ">
                <div class="card-title bg-dark">
                    <h3 class="card-text text-center text-black">{{ trans('global.etudiant.fields.profile') }}</h3>
                </div>
                <div class="card-body d-flex">
                <div class="table-responsive">
                        <table class="table table-secondary  table-bordered table-hover  datatable ">
                              <tr>
                                <th class="text-warning">Firstname</th>
                                <td class="text-info">{{ Auth::user()->profile->etudiant->prenom }}</td>
                              </tr>
                            
                          
                              <tr>
                                <th class="text-warning">Lastname</th>
                                <td class="text-info">{{Auth::user()->profile->etudiant->nom}}</td>
                              </tr>
                              <tr>
                                <th class="text-warning">Cne</th>
                                <td class="text-info">{{Auth::user()->profile->etudiant->cne}}</td>
                              </tr>
                              <tr>
                                <th class="text-warning">Groupe</th>
                                <td class="text-info">{{ Auth::user()->profile->groupe->groupe_tot.'.'.Auth::user()->profile->groupe->groupe_sgh }}</td>
                              </tr>
                            
                    </table>

     </div>
</div> 

</div>

<div class="card">
                <div class="card-title bg-dark">
                    <h3 class="card-text text-center text-black text-xl">{{ trans('global.cursus.title') }}</h3>
                </div>
                <div class="card-body d-flex">
                <div class="table-responsive">
                        <table class="table table-secondary table-bordered table-hover datatable  ">
                            
                                <tr>
                                    <th class="text-warning">
                                        {{ trans('global.stage.title_singular') }}
                                    </th>  
                                    <th class="text-warning">
                                        {{ trans('global.periode.title_singular') }}
                                    </th>
                                    <th class="text-warning">
                                        {{ trans('global.periode.fields.date_debut') }}
                                    </th>
                                    <th class="text-warning">
                                        {{ trans('global.periode.fields.date_fin') }}
                                    </th>
                                </tr>    
                          
                        
                                @foreach ($stages   as $stage)
                                <tr data-entry-id="{{ $stage->id }}">
                                    @php
                                            $periode_id=$stage->pivot->periode_id ;
                                           $periode=App\Periode::find($periode_id);
                                    @endphp

                                    <td class="text-info">
                                        {{ $stage->name ?? ''}}
                                    </td>
                                    <td class="text-info">
                                        {{ $periode->name ?? ''}}
                                    </td>
                                    <td class="text-info">
                                        {{ $periode->date_debut ?? '' }}
                                    </td>
                                    <td class="text-info">
                                        {{ $periode->date_fin ?? '' }}
                                    </td>       
                                 </tr>
                                @endforeach  
             </table>    
     </div>
</div>     --}}
            {{--
            <div class="card">
                <div class="card-header">
                   <h4 class="text-primary">{{ trans('global.etudiant.fields.profile') }}</h4>
                </div>   
                <div class="card-body">
                    <h4 class="text-info"> {{ trans('global.etudiant.fields.info') }}</h4>
                    <ul class="list-group-horizontal">
                        <li class="list-group-item list-group-item-primary"><h4 class="fas fa-id-card nav-icon">{{ ' CNE    :' }} {{ Auth::user()->profile->etudiant->cne }}</h4></li>
                        <li class="list-group-item list-group-item-primary"><h4 class="fas fa-portrait nav-icon">{{ ' Nom    :' }} {{ Auth::user()->profile->etudiant->nom }}</h4></li>
                        <li class="list-group-item list-group-item-primary"><h4 class="fas fa-portrait nav-icon">{{ ' Prenom :' }} {{ Auth::user()->profile->etudiant->prenom }}</h4></li>
                        <li class="list-group-item list-group-item-primary"><h4 class="fas fa-clone nav-icon">{{ ' Groupe :' }} {{ Auth::user()->profile->groupe->groupe_tot.'.'.Auth::user()->profile->groupe->groupe_sgh }}</h4></li>
                    </ul>
                    <h4 class="text-info">{{ trans('global.cursus.title') }}</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th width="10">
                                        
                                    </th>  
                                    <th>
                                        {{ trans('global.stage.title_singular') }}
                                    </th>  
                                    <th>
                                        {{ trans('global.periode.title_singular') }}
                                    </th>
                                    <th>
                                        {{ trans('global.periode.fields.date_debut') }}
                                    </th>
                                    <th>
                                        {{ trans('global.periode.fields.date_fin') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>    
                            </thead> 
                            <tbody>
                                @foreach ($stages   as $stage)
                                <tr data-entry-id="{{ $stage->id }}">
                                    @php
                                            $periode_id=$stage->pivot->periode_id ;
                                           $periode=App\Periode::find($periode_id);
                                    @endphp
                                    <td>
                        
                                    </td>
                                    <td>
                                        {{ $stage->name ?? ''}}
                                    </td>
                                    <td>
                                        {{ $periode->name ?? ''}}
                                    </td>
                                    <td>
                                        {{ $periode->date_debut ?? '' }}
                                    </td>
                                    <td>
                                        {{ $periode->date_fin ?? '' }}
                                    </td>
                                    <td>
                            
                                    </td>        
                                 </tr>
                                @endforeach
                            </tbody>   
                        </table>    
                    </div>    
                </div> 
            </div>  --}}
            @elseif(Auth::user()->isAdmin())
          
                 
                 
                 {{--  start card deck --}}
                <div class="card-columns">
                          <div class="card bg-primary">
                            <div class="card-body text-center">
                                <div class="fa fa-user-md fa-2x "></div>
                              <p class="card-text">Nombre totales des etudiants  <span class="badge badge-light">{{$stagaire->count()}}</span></p>
                            </div>
                          </div>
                          <div class="card bg-warning">
                             <div class="card-body text-center">
                                <div class="fas fa-briefcase-medical fa-2x "></div>
                            <p class="card-text">Nombre totales des encadrants  <span class="badge badge-light">{{App\Encadrant::count()}}</span></p>
                            </div>
                          </div>
                          <div class="card bg-success">
                           <div class="card-body text-center">
                            <div class="fas fa-user-edit md fa-2x"></div>
                            <p class="card-text">Nombre totales des secretaires  <span class="badge badge-light">{{App\Secretaire::count()}}</span></p>
                            </div>
                          </div>
                          <div class="card bg-danger">
                          <div class="card-body text-center">
                            <div class="fas fa-microscope fa-2x"></div>
                           <p class="card-text">Nombre totales des services d'accueil  <span class="badge badge-light">{{$service->count()}}</span></p>
                            </div>
                          </div>
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <div class="fas fa-file-medical-alt fa-2x"></div>
                                   <p class="card-text">Nombre totales des stages <span class="badge badge-dark">{{$stage->count()}}</span></p>
                                </div>
                       </div>
                          <div class="card bg-info">
                            <div class="card-body text-center">
                                <div class="fa far fa-hospital fa-2x "></div>
                                   <p class="card-text">Nombre totale des lieus des stages <span class="badge badge-light">
                                   {{--   {{count(\DB::table('services')->select('lieu')->distinct())}} --}}
                                    @php
                                     $p=\DB::select('select distinct lieu from services');
                                   @endphp
                                  {{ count($p)}}
                                </span></p> 
                             </div>
                          </div>
                 </div>

                  {{-- end card deck --}}
                 
            @else
                home

            @endif
        </div>
    </div>
@endsection
@section('scripts')
@parent

@endsection
