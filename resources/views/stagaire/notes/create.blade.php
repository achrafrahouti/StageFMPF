@extends('layouts.admin')
@section('content')
@php
    
@endphp
<div class="card">
    <div class="card-header">
        {{-- {{ trans('global.create') }} {{ trans('global.note.title_singular') }} --}}
       <center class="title exc-title-primary">                <h3 class="text-uppercase text-info hide">{{ $stage->name }}</h3> </center>
      {{--  <h3 class="h1"> Insert Notes de                 {{ $stage->name }}</h3> --}}
    </div>

    <div class="card-body">
        <form action="{{ route("stagaire.notes.store") }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <input size="12" type="hidden" name="stage" value="{{ $stage->id }}">
             {{-- //////////////////////////// --}}
             <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th>
                                {{-- {{ trans('global.note.fields.stage') }} --}}
                                Nom
                            </th>
                            <th>
                                {{-- {{ trans('global.note.fields.note') }} --}}
                                Prenom
                            </th>

                            <th >
                                {{-- {{ trans('global.note.fields.note') }} --}}
                                Présence
                                <em class="text-danger text-xs">*/3</em>
                            </th>
                            <th >
                                {{-- {{ trans('global.note.fields.note') }} --}}
                                Motivation
                                <em class="text-danger text-xs">*/3</em>

                            </th>
                            <th >
                                {{-- {{ trans('global.note.fields.note') }} --}}
                                Assiduité
                                <em class="text-danger text-xs">*/3</em>

                            </th>
                            <th >
                                {{-- {{ trans('global.note.fields.note') }} --}}
                                Intégration de l’équipe
                                <em class="text-danger text-xs">*/3</em>
                            </th>
                            <th >
                                {{-- {{ trans('global.note.fields.note') }} --}}
                                Evaluation des connaissances  
                                <em class="text-danger text-xs">*/8</em>
                            </th >
                            <th>
                                {{-- {{ trans('global.note.fields.note') }} --}}
                                Note
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stagaires as  $stagaire)
                            <tr data-entry-id="{{ $stagaire->id }}">

                                <td>
                                    {{ $stagaire->etudiant->nom ?? '' }}
                                </td>
                                <td>
                                    {{ $stagaire->etudiant->prenom ?? '' }}
                                </td>                                    
                                    <input size="12" type="hidden" name="stagaire_id[]" value="{{ $stagaire->id }}">
                                <td >
                                    
                                    <input size="12"class="form-control {{ $errors->has('presences.*') ? 'is-invalid' : '' }}"  type="double" name="presences[{{ $stagaire->id }}]" id="presences" value="{{ $stagaire->stages->where('id',$stage->id)->first()->pivot->presence }}">
                                    

                                    @error('presences.*')
                                    <div class="text-danger text-xs" role="alert">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </td>
                                <td >
                                    <input size="12" class="form-control {{ $errors->has('motivations.*') ? 'is-invalid' : '' }}" type="double" name="motivations[{{ $stagaire->id }}]" id="motivations" value="{{ $stagaire->stages->where('id',$stage->id)->first()->pivot->motivation }}">
                               
                                    @error('motivations.*')
                                    <div class=" text-danger text-xs" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror </td>
                                <td >
                                    <input size="12" class="form-control {{ $errors->has('Assiduites.*') ? 'is-invalid' : '' }}" type="double" name="Assiduites[{{ $stagaire->id }}]" id="Assiduites" value="{{ $stagaire->stages->where('id',$stage->id)->first()->pivot->Assiduite }}">
                               
                                    @error('Assiduites.*')
                                    <div class="text-danger text-xs" role="alert">
                                        {{ $message }}
                                      </div>
                                    @enderror </td>
                                <td >
                                    <input size="12" class="form-control {{ $errors->has('integrations.*') ? 'is-invalid' : '' }}" type="double" name="integrations[{{ $stagaire->id }}]" id="integrations" value="{{ $stagaire->stages->where('id',$stage->id)->first()->pivot->integration }}">
                                    @error('integrations.*')
                                    <div class="text-danger text-xs" role="alert">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </td>
                                <td >
                                    <input size="12" class="form-control {{ $errors->has('connaissances.*') ? 'is-invalid' : '' }}" type="double" name="connaissances[{{ $stagaire->id }}]" id="connaissances" value="{{ $stagaire->stages->where('id',$stage->id)->first()->pivot->connaissance }}">
                                    @error('connaissances.*')
                                    <div class="text-danger text-xs" role="alert">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </td>
                                <td>
                                    <input size="10" disabled  type="double"  value="{{ $stagaire->stages->where('id',$stage->id)->first()->pivot->note }}">

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <input size="12" type="hidden" name="isEncadrant" value="{{ Auth::user()->isEncadrant()}}">
                <input size="12" class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection