@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.groupe.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("stagaire.repartition.partitionner") }}" method="GET" enctype="multipart/form-data">
            {{-- @csrf --}}
            <div class="form-group {{ $errors->has('periode_id') ? 'has-error' : '' }}">
                <label for="periode_id">{{ trans('global.groupe.fields.periode_id') }}*</label>
                <select name="periode_id" id="periode_id" class="form-control select2" >
                    @foreach($periodes as $id => $periode)
                        <option value="{{ $periode->id }}">
                            {{ $periode->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('periode_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('periode_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.groupe.fields.periode_id_helper') }}
                </p>
            </div>
            
            <div class="form-group {{ $errors->has('stage_id') ? 'has-error' : '' }}">
                <label for="stage_id">{{ trans('global.groupe.fields.stage_id') }}*</label>
                <select name="stage_id" id="stage_id" class="form-control select2" >
                    @foreach($stages as $id => $stage)
                        <option value="{{ $stage->id }}">
                            {{ $stage->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('stage_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('stage_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.groupe.fields.stage_id_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('groupes') ? 'has-error' : '' }}">
                <label for="groupes">{{ trans('global.role.fields.groupes') }}*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="groupes[]" id="groupes" class="form-control select2" multiple="multiple">
                    @foreach($groupes as $id => $groupes)
                        <option value="{{ $groupes->id }}">
                            {{ $groupes->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('groupes'))
                    <em class="invalid-feedback">
                        {{ $errors->first('groupes') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.role.fields.groupes_helper') }}
                </p>
            </div>
            </div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection