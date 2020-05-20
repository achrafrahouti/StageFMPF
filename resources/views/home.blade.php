@extends('layouts.admin')
@section('content')
@can('update', Model::class)
    
@endcan
    <div class="row">
        <div class="col-lg-12">
            @if (Auth::user()->isEtudiant())
            <div class="card">
                <div class="card-header">
                   <h4 class="text-info"> {{ trans('global.cursus.title') }}</h4>
                   <div class="card-body custom-radio bg-info">
                   <center class="text-danger font-italic h2">{{ ' Votre Groupe  ' }}{{ $groupe->groupe_tot. '.'.$groupe->groupe_sgh }}</center>
                </div>
                </div>   
                <div class="card-body">
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