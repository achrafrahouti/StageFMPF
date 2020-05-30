@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.stage.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.stages.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.stage.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($stage) ? $stage->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.stage.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('services') ? 'has-error' : '' }}">
                <label for="services">{{ trans('global.stage.fields.services') }}*</label>
                <select name="service_id" id="service_id" class="form-control select2" >
                    @foreach($services as $id => $services)
                        <option value="{{ $id }}" {{ (in_array($id, old('services', [])) || isset($stage) && $stage->services->contains($id)) ? 'selected' : '' }}>
                         {{$id}}
                            {{ $services }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('services'))
                    <em class="invalid-feedback">
                        {{ $errors->first('services') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.stage.fields.services_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('niveau_id') ? 'has-error' : '' }}">
                <label for="niveau_id">{{ trans('global.periode.fields.niveau_id') }}*</label>
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
                    {{ trans('global.periode.fields.niveau_id_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection