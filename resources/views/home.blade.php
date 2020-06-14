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
            <div class="card pr-4 pl-4 mt-3" style="background-color:#bf56f0; color:white;"> 
        
                               <p>Gestion des stages</p>
            </div>
         </th>
               
        <th>
               <div class="card pr-4 pl-4 mt-3" style="background-color:#4778d1;color:white;">
                
                         <p>Gestion des demandes</p>  
                           
                </div>
        </th>   
            <th>
               <div class="card pr-4 pl-4 mt-3" style="background:#66c06b;color:white;">
                           
                                    <p>Gestion des encadants</p> 
                            
                </div>
        </th> 
    </tr>
    <tr>
        <td>
           <div class="card pr-4 pl-4 mt-3"  style="background-color:#bf56f0;color:white;"> 

                               <div class="d-inline"><p>Stages</span> <i class="badge badge-dark">{{$stages->count()}}</i>  <span class="float-right fas fa-stethoscope py-2 pl-2"></span></div> 
                 
            </div>
        </td>
        <td>
            <div class="card pr-4 pl-4 mt-3" style="background-color:#4778d1;color: white;"> 
                
                               <div class="d-inline"><p>Demandes acceptées</span> <i class="badge badge-success">{{$demandeA->count()}}</i>  <span class="float-right fas fa-check py-2 pl-2"></span></div> 
                
            </div>
              <div class="card pr-4 pl-4 mt-3" style="background-color:#4778d1;color:white;"> 
                                            
                                               <div class="d-inline"><p>Demandes réfusées</span> <i class="badge badge-danger">{{$demandeR->count()}}</i>  <span class="float-right fas fa-close py-2 pl-2"></span></div> 
              </div>
              <div class="card pr-4 pl-4 mt-3" style="background-color:#4778d1;color:white;"> 
                                            
                                               <div class="d-inline"><p>Demandes en cours</span> <i class="badge badge-dark">{{$demandeC->count()}}</i>  <span class="float-right fas fa-eye-slash py-2 pl-2"></span></div> 
             </div>

        </td>
        <td>
            <div class="card pr-4 pl-4 mt-3 " style="background:#66c06b;color:white;"> 
                             
                               <div class="d-inline"><p>Encadrants</span> <i class="badge  badge-dark">{{$encadants->count()}}</i>  <span class="float-right fas fa-medkit py-2 pl-2"></span></div> 
                  
            </div>
        </td>
    </tr>  
  </table>
  </div>
  <div class="card">
                <div class="card-title" style="background-color:#a05eac;color:white;">
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
                                        {{-- {{ trans('global.periode.fields.date_debut') }} --}}
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
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
                                        <i class=" 	fa fa-long-arrow-right"></i>
                                        <i class="badge badge-dark">{{ $periode->date_fin ?? '' }}</i>
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
                          <div class="card" style="background-color: #b19f9f;">
                            <div class="card-body text-center">
                                <div class="fa fa-user-md fa-2x "></div>
                              <p class="card-text">Nombre totales des etudiants  <span class="badge badge-light">{{$stagaire->count()}}</span></p>
                            </div>
                          </div>
                          <div class="card " style="background-color: #cfa98c;">
                             <div class="card-body text-center">
                                <div class="fas fa-briefcase-medical fa-2x "></div>
                            <p class="card-text">Nombre totales des encadrants  <span class="badge badge-light">{{App\Encadrant::count()}}</span></p>
                            </div>
                          </div>
                          <div class="card " style="background-color: #9a90c5;">
                           <div class="card-body text-center">
                            <div class="fas fa-user-edit md fa-2x"></div>
                            <p class="card-text">Nombre totales des secretaires  <span class="badge badge-light">{{App\Secretaire::count()}}</span></p>
                            </div>
                          </div>
                          <div class="card " style="background-color: #b68989;">
                          <div class="card-body text-center">
                            <div class="fas fa-microscope fa-2x"></div>
                           <p class="card-text">Nombre totales des services d'accueil  <span class="badge badge-light">{{$service->count()}}</span></p>
                            </div>
                          </div>
                            <div class="card" style="background-color: #8cc7bf;">
                                <div class="card-body text-center">
                                    <div class="fas fa-file-medical-alt fa-2x"></div>
                                   <p class="card-text">Nombre totales des stages <span class="badge badge-light">{{$stage->count()}}</span></p>
                                </div>
                       </div>
                          <div class="card " style="background-color: #7798b3;">
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


            @elseif (Auth::user()->isEncadrant())
            @php
                $niveaux=App\Niveau::all();
            @endphp
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong > {{ trans('global.choix') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <div class="card">
                <div class="card-header">
                  <div class="container-sm text-center">
                     <h1 class="badge badge-dark text-bold">{{ 'Planing  des Stages ' }}  </h1>
           </div>
                <div class="form-group {{ $errors->has('niveau_id') ? 'has-error' : '' }}">
                  <div class="row ">
                    <label class="text-right col-sm-2" for="niveau_id"><strong class="text-secondary"> {{ trans('global.periode.fields.niveau_id') }} :</strong></label>
                    <select name="niveau_id" id="niveau_id" class=" col-sm-3 custom-select custom-select-sm " >
                        <option value="0" selected>{{ trans('global.repartition.fields.choix') }}</option>
                        @foreach($niveaux as $id => $niveau)
                            <option id="niveau_id" value="{{ $niveau->id }}">
                                {{ $niveau->liblle }}
                            </option>
                        @endforeach
                    <p class="helper-block"></p>
                        {{ trans('global.repartition.fields.niveau_id_helper') }}
                    </p>
                    </select>
                   <button  id="but_search" class="btn btn-info mx-3 py-0 px-3" type="submit"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                  <div class="text-center "> </div> 
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class=" table table-bordered table-striped table-hover ">
                          <thead>
                              <tr>
          
                                  <th class="text-center">
                                      {{ trans('global.periode.title_singular') }}
                                      {{-- Periodes --}}
                                  </th>
                                  <th class="text-center">
                                      {{ trans('global.stage.title_singular') }}
                                      {{-- Stages --}}
                                  </th>
                                  <th class="text-center">
                                    {{ trans('global.groupe.title_singular') }}
          
                                     {{-- groupes --}}
                                  </th>
                                 
                                  <th>
                                      &nbsp;
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            @php
                            $periodes=App\Periode::where('niveau_id',$niveau->id)->get();
                            @endphp
                              @foreach($periodes as $periode)
                                  <tr>
                              
                                     
                                     <td rowspan="{{$periode->stages->unique()->count()+1}}">
                                      <strong>
                                         <center > <h3 class="badge badge-danger">{{ $periode->name ?? '' }}</h3> <hr><br> <br> <br><br> </center>
                                         <center ><p class="badge badge-dark"> {{ $periode->date_debut ?? '' }} <i class=" 	fa fa-long-arrow-right"></i>
                                         {{ $periode->date_fin ?? '' }} </p></center>
                                      </strong>
                                        </td>
                                       @foreach($periode->stages->unique() as $stage)
          
                                        @php
                                              $groupes=\DB::select('select * from groupes g,stage_groupe_periode p where p.periode_id= ? and p.stage_id=? and p.groupe_id=g.id',[$periode->id,$stage->id]);
                                         @endphp
                                         <tr>
                                              <td class="text-center">
                                               <strong class="text-bold"> {{ $stage->name?? '' }}</strong>
                                              </td>
                                          <td class="text-center"> 
                                        @foreach($groupes as $groupe)
                                         <span class="badge badge-light">{{$groupe->name}}</span><br> 
                                        @endforeach
                                          </td>
                                         </tr>    
                                       @endforeach
                                     
                                      <td>
                                      
                                      </td>
                                      <td>
                                          @can('groupe_show')
                                 
                                          @endcan
                                          @can('groupe_edit')
          
                                          @endcan
                                          @can('groupe_delete')
          
                                          @endcan
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody> 
                      </table>
                  </div>
               </div>
               
              
          </div>
                  
            
                  

            @else
                home

            @endif
        </div>
    </div>
@endsection
@section('scripts')
@parent
<script type='text/javascript'>
    $(document).ready(function(){


     $('#but_search').click(function(){
     
           var niveau_id = Number($('#niveau_id').val().trim());
           console.log(niveau_id);
           var action = '/stagaire/getPeriode/'+niveau_id;
           $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
           $('body').find('.remove-form').append('<input name="_method" type="hidden" value="get">');
           $('body').find('.remove-form').submit();

});

    });

 </script>
@endsection
