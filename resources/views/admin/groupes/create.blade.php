@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.groupe.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.groupes.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
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

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.groupe.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($groupe) ? $groupe->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.groupe.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('groupe_tot') ? 'has-error' : '' }}">
                <label for="groupe_tot">{{ trans('global.groupe.fields.groupe_tot') }}*</label>
                <input type="number" id="groupe_tot" name="groupe_tot" class="form-control" value="{{ old('groupe_tot', isset($groupe) ? $groupe->groupe_tot : '') }}">
                @if($errors->has('groupe_tot'))
                    <em class="invalid-feedback">
                        {{ $errors->first('groupe_tot') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.groupe.fields.groupe_tot_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('groupe_sh') ? 'has-error' : '' }}">
                <label for="groupe_sh">{{ trans('global.groupe.fields.groupe_sh') }}*</label>
                <input type="number" id="groupe_sh" name="groupe_sh" class="form-control" value="{{ old('groupe_sh', isset($groupe) ? $groupe->groupe_sh : '') }}">
                @if($errors->has('groupe_sh'))
                    <em class="invalid-feedback">
                        {{ $errors->first('groupe_sh') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.groupe.fields.groupe_sh_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('groupe_sgh') ? 'has-error' : '' }}">
                <label for="groupe_sgh">{{ trans('global.groupe.fields.groupe_sgh') }}*</label>
                <input type="number" id="groupe_sgh" name="groupe_sgh" class="form-control" value="{{ old('groupe_sgh', isset($groupe) ? $groupe->groupe_sgh : '') }}">
                @if($errors->has('groupe_sgh'))
                    <em class="invalid-feedback">
                        {{ $errors->first('groupe_sgh') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.groupe.fields.groupe_sgh_helper') }}
                </p>
            </div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection