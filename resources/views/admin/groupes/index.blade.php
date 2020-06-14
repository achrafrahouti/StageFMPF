@extends('layouts.admin')
@section('content')
@if (session('create'))

<div class="alert alert-success alert-dismissible fade show" groupe="alert">
    <strong>Succes</strong>    {{ session('create') }}!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

@endif
@if (session('update'))
<div class="alert alert-success alert-dismissible fade show" groupe="alert">
    <strong>Succes</strong>    {{ session('update') }}!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@if (session('delete'))
<div class="alert alert-success alert-dismissible fade show" groupe="alert">
    <strong>Succes</strong>    {{ session('delete') }}!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
 <div class="card">
     <div class="card-header"> 
       {{--  Liste des groupes --}}
            @can('groupe_create')
    <div style="margin-bottom: 10px;" class="row float-right">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.groupes.create") }}">
                <i class="fas fa-plus"></i> {{-- {{ trans('global.groupe.title_singular') }} --}}
            </a>
        </div>
    </div>
     @endcan
     </div>
     <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                           {{--  {{ trans('global.groupe.fields.name') }} --}}NOM
                        </th>
                        <th>
                             {{-- {{ trans('global.groupe.fields.groupe_tot') }} --}}Groupe
                        </th>
                        <th>
                            {{-- {{ trans('global.groupe.fields.groupe_sh') }} --}}sous groupe
                        </th>
                        <th>
                            {{-- {{ trans('global.groupe.fields.groupe_sgh') }} --}} Sous sous groupe
                        </th>
                        <th>
                            {{-- {{ trans('global.groupe.fields.groupe_sgh') }} --}}
                            Niveau
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groupes as $key => $groupe)
                        <tr data-entry-id="{{ $groupe->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $groupe->name ?? '' }}
                            </td>
                            <td>
                                {{ $groupe->groupe_tot ?? '' }}
                            </td>
                            <td>
                                {{ $groupe->groupe_sh ?? '' }}
                            </td>
                            <td>
                                {{ $groupe->groupe_sgh ?? '' }}
                            </td>
                            <td>
                                {{ $groupe->niveau->liblle ?? '' }}
                            </td>
                            <td>

                              <center>
                                @can('groupe_show')
                                    <a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.groupes.show', $groupe->id) }}">
                                       <i class="fas fa-eye"></i> 
                                    </a>
                                @endcan
                                @can('groupe_edit')
                                    <a class="btn btn-xs btn-info mr-2" href="{{ route('admin.groupes.edit', $groupe->id) }}">
                                        <i class="fas fa-edit"></i> 
                                    </a>
                                @endcan
                                @can('groupe_delete')
                                <button class="btn btn-xs btn-danger remove-groupe" data-id="{{ $groupe->id }}" data-action="{{ route('admin.groupes.destroy', $groupe->id) }}"> <i class="fas fa-trash "></i></button>
                                @endcan
                                </center>
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
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.groupes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        swal.fire('{{ trans('global.datatables.zero_selected') }}','','warning')

        return
      }
// 
Swal.fire({
        title: "Vous êtes sûr?",
        text: "Vous ne pourrez pas récupérer cette ligne!",
        type: "error",
        icon: 'warning',
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',cancelButtonText:'Annuler',
        confirmButtonText: 'Supprimer!',
}).then((result) => {
  if (result.value) {
    $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
    Swal.fire({
      title:'Supprimé',
      text:'Votre ligne a été supprimé.',
      icon:'success',
      timer:3000
    })
  }
})
// 
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('groupe_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
{{-- mememememememememememememmeemememmememememememememememememememememememememem --}}
@parent
<script type="text/javascript">
  $("body").on("click",".remove-groupe",async  function(){
    var current_object = $(this);
    // console.log(current_object);
    // return;
  const WillDelete = await  swal.fire({
        title: "Vous êtes sûr?",
        text: "Vous ne pourrez pas récupérer cette ligne!",
        type: "error",
        icon: 'warning',
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',cancelButtonText:'Annuler',
        confirmButtonText: 'Supprimer!',
    });
    if(WillDelete){
        if (WillDelete.isConfirmed) {      console.log(WillDelete.isConfirmed);
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');
            $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    }
});
</script>
@endsection
@endsection