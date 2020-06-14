@extends('layouts.admin')
@section('content')
@if (session('succes'))

<div class="alert alert-success alert-dismissible fade show" etudiant="alert">
    <strong>Succes</strong>    {{ session('succes') }}!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

@endif
@if (session('error'))

<div class="alert alert-danger alert-dismissible fade show" etudiant="alert">
    <strong>échec</strong>    {{ session('error') }}!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

@endif
  <div class="card">
      <div class="card-header">
        <div class="container-sm text-center">
           <h1 class="badge badge-dark text-bold">{{ 'Planing  des Stages ' }}  </h1>
</div>
    @can('groupe_create')
    <div style="margin-bottom: 10px;" class="row float-right">
      <div class="col-lg-12">
          <a class="btn btn-success" href="{{ route("stagaire.synchroniser") }}">
               Repartir
          </a>
      </div>
  </div>
      <div class="form-group {{ $errors->has('niveau_id') ? 'has-error' : '' }}">
        <div class="row ">
          <label class="text-right col-sm-2" for="niveau_id"><strong class="text-secondary"> {{ trans('global.periode.fields.niveau_id') }} :</strong></label>
          <select name="niveau_id" id="niveau_id" class=" col-sm-3 custom-select custom-select-sm " >
              <option value="0" selected>{{-- {{ trans('global.repartition.fields.choix') }} --}} Choisir un niveau</option>
              @foreach($niveaux as $id => $niveau)
                  <option id="niveau_id" value="{{ $niveau->id }}">
                      {{ $niveau->liblle }}
                  </option>
              @endforeach
          <p class="helper-block"></p>
              {{ trans('global.repartition.fields.niveau_id_helper') }}
          </p>
          </select>
         <button  id="but_search" class="btn btn-info mx-3 py-0 px-3" type="submit"><i class="fa fa-search"></i></button>
        </div>
      </div>

     @endcan
    


        <div class="text-center "> </div> 
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{-- {{ trans('global.etudiant.fields.title') }} --}}
                            CNE
                        </th>
                        <th>
                            {{-- {{ trans('global.etudiant.fields.permissions') }} --}}
                            Nom
                        </th>                        
                        <th>
                            {{-- {{ trans('global.etudiant.fields.permissions') }} --}}
                            Prenom
                        </th>
                        <th>
                            {{-- {{ trans('global.etudiant.fields.permissions') }} --}}
                            Stages
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($etudiants as $key => $etudiant)
                        <tr data-entry-id="{{ $etudiant->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $etudiant->cne ?? '' }}
                            </td>
                            <td>
                                {{ $etudiant->nom ?? '' }}
                            </td>
                            <td>
                                {{ $etudiant->prenom ?? '' }}
                            </td>
                            <td>

                                @foreach($etudiant->stagaire->stages as $key => $item)
                                    <span class="badge badge-info">{{$item->name}}</span>
                                @endforeach
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
     </div>
    
</div>
@section('scripts') 
@parent
<script>
  $(function () {
let deleteButtonTrans = ''
let deleteButton = {
  text: deleteButtonTrans,
  url: "{{ route('stagaire.affectation.show') }}",
  className: '',
  action: function (e, dt, node, config) {
    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
        return $(entry).data('entry-id')
    });

    if (ids.length === 0) {
      swal.fire('{{ trans('global.datatables.zero_selected') }}','select a row','error')

      return
    }
// 
Swal.fire({
title: 'Are you sure?',
text: "You won't be able to revert this!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Yes, delete it!'
}).then((result) => {
if (result.value) {
  $.ajax({
        headers: {'x-csrf-token': _token},
        method: 'POST',
        url: config.url,
        data: { ids: ids, _method: 'DELETE' }})
        .done(function () { location.reload() })
  Swal.fire({
    titlt:'Deleted!',
    text:'Your file has been deleted.',
    icon:'success',
    timer:3000
  })
}
})
// 
  }
}
let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
$('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>

<script type='text/javascript'>
     $(document).ready(function(){


      $('#but_search').click(function(){
      
            var niveau_id = Number($('#niveau_id').val().trim());
            console.log(niveau_id);
            var action = '/stagaire/getStagaires/'+niveau_id;
            $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="get">');
            $('body').find('.remove-form').submit();

});

     });

  </script>
@endsection
@endsection