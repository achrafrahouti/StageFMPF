@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.groupe.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("stagaire.repartition.repartir") }}" method="GET" enctype="multipart/form-data">
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
            </div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection