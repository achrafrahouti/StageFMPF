{{-- @extends('layouts.admin')


@section('content')
@php
    $niveaux=App\Niveau::all();
@endphp
@if (session('succes'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes</strong>    {{ session('succes') }}!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

@endif
<div class="card" id="poopup">
    <div class="card-header">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong >  Choisir un niveau </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @can('groupe_create')
          <div style="margin-bottom: 10px;" class="row float-right">
              <div class="col-lg-12">
                  <a class="btn btn-success" href="{{ route("stagaire.repartition.choix") }}">
                      <i class="fas fa-plus"></i> {{ 'Repartir'}}
                  </a>
              </div>
          </div>
           @endcan

    </div>

    <div class="card-body">
        <form action="{{ route('stagaire.repartition.show') }}" method="GET" enctype="multipart/form-data">
            <div class="form-group {{ $errors->has('niveau_id') ? 'has-error' : '' }}">
                <label for="niveau_id">{{ trans('global.periode.fields.niveau_id') }}</label>
                
                <select name="niveau_id" id="niveau_id" class="form-control select2-selection__choice" onchange="set(this.value);">
                    <option selected>{{ trans('global.repartition.fields.choix') }}</option>
                    @foreach($niveaux as $id => $niveau)
                        <option id="niveau_id" value="{{ $niveau->id }}">
                            {{ $niveau->liblle }}
                        </option>
                    @endforeach
                <p class="helper-block"></p>
                    {{ trans('global.repartition.fields.niveau_id_helper') }}
                </p>
                </select>
                <br>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}" >

            </div>
        </form>

    </div>
</div>

@endsection
 --}}
