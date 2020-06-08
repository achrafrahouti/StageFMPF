@extends('layouts.admin')
@section('content')
@php
    $niveaux=App\Niveau::all();
@endphp
<div class="card">
    <div class="card-header">
        <center>        {{ trans('global.create') }} {{ trans('global.groupe.title_singular') }}
</center>
        <div class="form-group {{ $errors->has('niveau_id') ? 'has-error' : '' }}">
            <label for="niveau_id">{{ trans('global.groupe.fields.niveau_id') }}*</label>
            
            <select name="niveau_id" id="niveau_id" class="form-control select2-selection__choice" onchange="set(this.value);">
                <option selected>Choisir une niveau</option>
                @foreach($niveaux as $id => $niveau)
                    <option id="niveau_id" value="{{ $niveau->id }}">
                        {{ $niveau->liblle }}
                    </option>
                @endforeach
            <p class="helper-block"></p>
                {{ trans('global.periode.fields.niveau_id_helper') }}
            </p>
            </select>
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route("stagaire.repartition.partitionner") }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <button type="button" onclick="set();" class="btn btn-warning" id="save">Save</button> --}}
            <div class="form-group ">
                <label for="periode_id">{{ trans('global.periode.fields.') }}*</label>
                <select name="periode_id" id="periode_id" class="form-control select2" >
 
                </select>
                <p class="helper-block">
                    {{ trans('global.groupe.fields.periode_id_helper') }}
                </p>
            </div>

            <div class="form-group">
                <label for="stage_id">{{ trans('global.periode.fields.') }}*</label>
                <select name="stage_id" id="stage_id" class="form-control select2" >
 
                </select>
                <p class="helper-block">
                    {{ trans('global.groupe.fields.periode_id_helper') }}
                </p>
            </div>
            <div class="form-group">
                <label for="groupes">{{ trans('global.role.fields.groupes') }}*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="groupes[]" id="groupes" class="form-control select2" multiple="multiple">

                </select>
                <p class="helper-block">
                    {{ trans('global.role.fields.groupes_helper') }}
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
                    url:'stagaire/repartition/'+niveau_id,
                    success:function(response){
                        var data=JSON.parse(response);
                        var periodes=data.periodes;
                        var stages=data.stages;
                        var groupes=data.groupes;

                        $('#periode_id').empty();
                        if(periodes.length>0){
                        for(i=0;i<periodes.length;i++){
                            var periode="<option value='"+periodes[i].id+"'>"+periodes[i].name+"</option>";
                                               $('#periode_id').append(periode);
                        }         
                    }
                        $('#stage_id').empty();
                        if(stages.length>0){
                        for(i=0;i<stages.length;i++){
                            var stage="<option value='"+stages[i].id+"'>"+stages[i].name+"</option>";
                                               $('#stage_id').append(stage);
                        }         
                    }
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
        // });
        });

    }
    </script>