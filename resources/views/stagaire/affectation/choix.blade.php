@extends('layouts.admin')


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
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong >   Affichage de la liste des stagaires par  groupe ou plusieurs groupes </strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<div class="card">
    <div class="card-header">

          <div style="margin-bottom: 10px;" class="row float-right">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("stagaire.affectation.index") }}">
                      Regrouper
                </a>
            </div>
        </div>
    
    <div class="card-body">
        <form action="{{ route('stagaire.affectation.afficher') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="form-group {{ $errors->has('niveau_id') ? 'has-error' : '' }}">
            <label for="niveau_id">{{ trans('global.periode.fields.niveau_id') }}</label>
            
            <select name="niveau_id" id="niveau_id" class="form-control select2-selection__choice" onchange="set(this.value);" >
                <option >{{-- {{ trans('global.repartition.fields.choix') }} --}} Choisir un niveau </option>
                @foreach($niveaux as $id => $niveau)
                    <option id="niveau_id" value="{{ $niveau->id }}">
                        {{ $niveau->liblle }}
                    </option>
                @endforeach
            <p class="helper-block">
                {{ trans('global.repartition.fields.niveau_id_helper') }}
            </p>
            </select>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route('stagaire.affectation.afficher') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group"  {{ $errors->has('groupes') ? 'has-error' : '' }}>
                <label for="groupes">{{-- {{ trans('global.repartition.fields.groupe') }} --}}Groupe*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="groupes[]" id="groupes" class="form-control select2" multiple="multiple">
                </select>
                <p class="helper-block">
                    {{ trans('global.repartition.fields.groupe_helper') }}
                </p>
            </div> 
                   <button class="btn btn btn-info float-right">
                           suivant <span class="fas fa-arrow-right"></span>
                   </button>
        </form>

    </div>
</div>
</div>
@endsection
<script type="text/javascript" >
    function set(id){
        var niveau_id=Number(id);
        $(document).ready(function(){
            if (niveau_id) {
                console.log(niveau_id);
                $.ajax({
                    url:'stagaire/affecter/'+niveau_id,
                    success:function(response){

                        var data=JSON.parse(response);
                        var groupes=data.groupes;
                        console.log(groupes);
                    $('#groupes').empty();
                        if(groupes.length>0){
                        for(i=0;i<groupes.length;i++){
                            var groupe="<option value='"+groupes[i].id+"'>"+groupes[i].name+"</option>";
                                               $('#groupes').append(groupe);
                        }         
                    }
                    }
                });
            }
        });

    }
    </script>
