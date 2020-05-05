@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.periode.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.periodes.update", [$periode->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.periode.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($periode) ? $periode->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.periode.fields.name_helper') }}
                </p>
            </div>
            {{-- ooooooooooooooo --}}
            <div class="form-group {{ $errors->has('date_debut') ? 'has-error' : '' }}">
                <label for="date_debut">{{ trans('global.periode.fields.date_debut') }}</label>
                <input type="date" id="date_debut" name="date_debut" class="form-control" value="{{ old('date_debut', isset($periode) ? $periode->date_debut : '') }}" step="0.01">
                @if($errors->has('date_debut'))
                    <em class="invalid-feedback">
                        {{ $errors->first('date_debut') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.periode.fields.date_debut_helper') }}
                </p>
            </div>
            {{-- ooooooooooooooooooo --}}
            <div class="form-group {{ $errors->has('date_fin') ? 'has-error' : '' }}">
                <label for="date_fin">{{ trans('global.periode.fields.date_fin') }}</label>
                <input type="date" id="date_fin" name="date_fin" class="form-control" value="{{ old('date_fin', isset($periode) ? $periode->date_fin : '') }}" step="0.01">
                @if($errors->has('date_fin'))
                    <em class="invalid-feedback">
                        {{ $errors->first('date_fin') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.periode.fields.date_fin_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection