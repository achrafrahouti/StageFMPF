@extends('layouts.admin')
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
            @endphp
            <div class="card">
                <div class="card-header">
                   <h4 class="text-primary"> Profile</h4>
                </div>   
                <div class="card-body">
                    <h4 class="text-info">Information Personnele</h4>
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
            </div>              
            @else
                home
            @endif
        </div>
    </div>
@endsection
@section('scripts')
@parent

@endsection