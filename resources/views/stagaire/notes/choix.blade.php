@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
         {{ trans('global.note.ctitle') }}
    </div>

    <div class="card-body">
        <form action="{{ route("stagaire.notes.create") }}" method="GET" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group {{ $errors->has('stages') ? 'has-error' : '' }}">
                <label for="stage">{{ trans('global.stage.title') }}*
                <select name="stage" id="stage" class="form-control select2">
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
            <div class="form-group {{ $errors->has('groupes') ? 'has-error' : '' }}">
                <label for="groupe">{{ trans('global.groupe.title') }}*
                <select name="groupe" id="groupe" class="form-control select2">
                    @foreach($groupes as $groupe)
                        <option value="{{ $groupe->id }}" >
                         {{ $groupe->id }}   {{ 'Groupe'.$groupe->groupe_tot.'-'.$groupe->groupe_sgh }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('groupes'))
                    <em class="invalid-feedback">
                        {{ $errors->first('groupes') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.note.fields.note_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection