@extends('layouts.admin')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="card">
    <div class="card-header">
       {{--  {{ trans('global.create') }} {{ trans('global.groupe.title_singular') }} --}}
    </div>

    <div class="card-body">
        <form action="{{ route("stagaire.affectation.store") }}" method="GET" enctype="multipart/form-data">
            {{-- @csrf --}}
            <div class="form-group {{ $errors->has('niveau_id') ? 'has-error' : '' }}">
                <label for="niveau_id">{{ trans('global.groupe.fields.niveau_id') }}*</label>
                <select name="niveau_id" id="niveau_id" class="form-control select2" >
                    @foreach($niveaux as $id => $niveau)
                        <option value="{{ $niveau->id }}">
                            {{ $niveau->liblle }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('niveau_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('niveau_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.groupe.fields.niveau_id_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('capacite') ? 'has-error' : '' }}">
                <label for="capacite">Nombre des Stagaires dans sous groupe<strong>(valeur par defaut:la capcité minimale du services d'accueils)</strong></label>
                <input type="number" id="capacite" name="capacite" class="form-control" value="{{ old('capacite', isset($groupe) ? $groupe->capacite : '') }}">
                @if($errors->has('capacite'))
                    <em class="invalid-feedback">
                        {{ $errors->first('capacite') }}
                    </em>
                @endif     

 
                <p class="helper-block text-danger">
                      {{-- Si ce champ est vide:Valeur par defaut c'est capacité minimale de service du niveau --}}
                 </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
           </div>
        </form>
    </div>
</div>


<script>
  


</script>

@endsection