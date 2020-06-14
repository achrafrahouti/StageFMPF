@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{-- {{ trans('global.show') }} {{ trans('global.demande.title') }} --}}


    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{trans('global.groupe.fields.niveau_id')}}

                    </th>

                            <td >
                                  {{ $demande->stagaire->etudiant->niveau->liblle?? '' }}
                            </td>  
                </tr>
                <tr>
                    <th>
                                                    {{trans('global.groupe.fields.groupe_tot')}}

                        </th>

                             <td >
                                  {{ $demande->stagaire->groupe->name ?? '' }}
                            </td>
                </tr>
                <tr> 
                    <th>
                        {{ trans('global.demande.fields.stage') }}   
                    </th>
                    <td>
                    {{ $demande->stage->name}}
                   </td>
                </tr>
                  <tr>
                            <th>
                                {{ trans('global.demande.fields.type') }}
                            </th>
                            <td>
                                {{ $demande->type_dem }}
                           </td>
                  </tr>  
                <tr>       
                    <th>
                        {{ trans('global.demande.fields.objet') }}
                    </th>
                    <td>
                        {{ $demande->objet_dem }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection