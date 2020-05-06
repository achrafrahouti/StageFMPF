@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.service.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.services.update", [$service->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- iname --}}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.service.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($service) ? $service->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.service.fields.name_helper') }}
                </p>
            </div>
            {{-- capacite --}}
            <div class="form-group {{ $errors->has('capacite') ? 'has-error' : '' }}">
                <label for="capacite">{{ trans('global.service.fields.capacite') }}*</label>
                <input type="text" id="capacite" name="capacite" class="form-control" value="{{ old('capacite', isset($service) ? $service->capacite : '') }}">
                @if($errors->has('capacite'))
                    <em class="invalid-feedback">
                        {{ $errors->first('capacite') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.service.fields.capacite_helper') }}
                </p>
            </div>
            {{-- lieu --}}
            <div class="form-group {{ $errors->has('lieu') ? 'has-error' : '' }}">
                <label for="lieu">{{ trans('global.service.fields.lieu') }}*</label>
                <input type="text" id="lieu" name="lieu" class="form-control" value="{{ old('lieu', isset($service) ? $service->lieu : '') }}">
                @if($errors->has('lieu'))
                    <em class="invalid-feedback">
                        {{ $errors->first('lieu') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.service.fields.lieu_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection