@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{-- {{ trans('global.create') }} {{ trans('global.demande.title_singular') }} --}}
    </div>

    <div class="card-body">
        <form action="{{ route("stagaire.demandes.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('stages') ? 'has-error' : '' }}">
                <label for="stage">{{ trans('global.stage.title') }}*</label>
                <select name="id_stage" id="stage" class="form-control  select2-selection __choice">
                    @foreach($stages as $stage)
                        <option value="{{ $stage->id }}" >
                           {{ $stage->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('stages'))
                    <em class="invalid-feedback">
                        {{ $errors->first('stages') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.note.fields.note_helper') }}
                </p>
            </div>
            {{-- kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk --}}
            <div class="form-group {{ $errors->has('type_dem') ? 'has-error' : '' }}">
                <label for="type_dem">{{ trans('global.demande.fields.type') }}*</label>
                <select name="type_dem" id="type_dem" class="form-control  select2-selection __choice">
                    <option value="" selected >Sélectionner le type de demande : </option>
                    <option value="Transfert">{{ trans('global.demande.type_d.transfert') }}</option>
                    @if(Auth::user()->profile->etudiant->niveau->id==6)
                    <option value="Revalidation">{{ trans('global.demande.type_d.revalidation') }}</option>
                    @endif
                    <option value="Reclamtion">{{ trans('global.demande.type_d.reclamation') }}</option>
                </select>
                @if($errors->has('type_dem'))
                    <em class="invalid-feedback">
                        {{ $errors->first('type_dem') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.demande.fields.type_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('objet_dem') ? 'has-error' : '' }}">
                <label for="objet">{{ trans('global.demande.fields.objet') }}*</label>
                <textarea type="text" id="objet" name="objet_dem" class="form-control" value="{{ old('objet_dem', isset($Demande) ? $Demande->objet_dem : '') }}"></textarea>
                @if($errors->has('objet_dem'))
                    <em class="invalid-feedback">
                        {{ $errors->first('objet_dem') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.demande.fields.objet_helper') }}
                </p>
            </div>
                <input type="hidden" name="id_stagaire" value="{{ Auth::user()->profile->id }}">
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>


        </form>
    </div>
</div>

@endsection