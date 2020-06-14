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
@if (session('error'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erreur</strong>    {{ session('error') }}!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

@endif
@if (session('verify'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erreur</strong>    {{ session('verify') }}!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

@endif
<div class="card">
    <div class="card-header">
       {{--  <center>         {{ trans('global.repartition.title_singular') }}
</center> --}}
        <div class="form-group {{ $errors->has('niveau_id') ? 'has-error' : '' }}">
            <label for="niveau_id">{{ trans('global.periode.fields.niveau_id') }}</label>
            
            <select name="niveau_id" id="niveau_id" class="form-control select2-selection__choice" @if (Auth::user()->isAdmin())onchange="setAdmin(this.value);"@endif @if (Auth::user()->isSecretaire() || Auth::user()->isEncadrant())onchange="set(this.value);"@endif >
                <option selected>{{-- {{ trans('global.repartition.fields.choix') }} --}}Choisir un niveau </option>
                @foreach($niveaux as $id => $niveau)
                    <option id="niveau_id" value="{{ $niveau->id }}">
                        {{ $niveau->liblle }}
                    </option>
                @endforeach
            <p class="helper-block"></p>
                {{ trans('global.repartition.fields.niveau_id_helper') }}
            </p>
            </select>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route("stagaire.notes.create") }}" method="GET" enctype="multipart/form-data">
            {{-- @csrf --}}
            {{-- <button type="button" onclick="set();" class="btn btn-warning" id="save">Save</button> --}}


            <div class="form-group">
                <label for="stage_id">{{-- {{ trans('global.repartition.fields.stage') }}* --}}Stages</label>
                <select name="stage_id" id="stage_id" class="form-control select2" >
 
                </select>
                <p class="helper-block">
                    {{ trans('global.repartition.fields.stage_helper') }}
                </p>
            </div>
            <div class="form-group">
                <label for="groupe_id">{{-- {{ trans('global.repartition.fields.groupe') }}* --}}Groupes</label>
                <select name="groupe_id" id="groupe_id" class="form-control select2" >

                </select>
                <p class="helper-block">
                    {{ trans('global.repartition.fields.groupe_helper') }}
                </p>
            </div>
            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">

        </div>
        </form>

    </div>
</div>

@endsection
<script type="text/javascript" >
    function set(id){
        var niveau_id=Number(id);
        $(document).ready(function(){
        // var id=Number($('#niveau_id').val());
        // $('#save').on('change',function(){
            // var niveau_id=$('#niveau_id').val();

            if (niveau_id) {
                $.ajax({
                    url:'stagaire/getinfo/'+niveau_id,
                    success:function(response){
                        var data=JSON.parse(response);
                        var periodes=data.periodes;
                        var stages=data.stages;
                        var groupes=data.groupes;

                        $('#stage_id').empty();
                        if(stages.length>0){
                        for(i=0;i<stages.length;i++){
                            if(stages[i].niveau_id==niveau_id){
                            var stage="<option value='"+stages[i].id+"'>"+stages[i].name+"</option>";
                                               $('#stage_id').append(stage);}
                        }         
                    }
                    $('#groupe_id').empty();
                        if(groupes.length>0){
                        for(i=0;i<groupes.length;i++){
                            var groupe="<option value='"+groupes[i].id+"'>"+groupes[i].name+"</option>";
                                               $('#groupe_id').append(groupe);
                        }         
                    }
                    }
                });
            }
        // });
        });

    }
    </script>
    <script type="text/javascript" >
        function setAdmin(id){
            var niveau_id=Number(id);
            $(document).ready(function(){
            // var id=Number($('#niveau_id').val());
            // $('#save').on('change',function(){
                // var niveau_id=$('#niveau_id').val();
    
                if (niveau_id) {
                    $.ajax({
                        url:'stagaire/getinfoAdmin/'+niveau_id,
                        success:function(response){
                            var data=JSON.parse(response);
                            var periodes=data.periodes;
                            var stages=data.stages;
                            var groupes=data.groupes;
    
                            $('#stage_id').empty();
                            if(stages.length>0){
                            for(i=0;i<stages.length;i++){
                                var stage="<option value='"+stages[i].id+"'>"+stages[i].name+"</option>";
                                                   $('#stage_id').append(stage);
                            }         
                        }
                        $('#groupe_id').empty();
                            if(groupes.length>0){
                            for(i=0;i<groupes.length;i++){
                                var groupe="<option value='"+groupes[i].id+"'>"+groupes[i].name+"</option>";
                                                   $('#groupe_id').append(groupe);
                            }         
                        }
                        }
                    });
                }
            // });
            });
    
        }
        </script>