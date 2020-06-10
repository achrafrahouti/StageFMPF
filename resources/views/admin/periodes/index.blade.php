@extends('layouts.admin')
@section('content')
@if (session('create'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes!</strong> {{ session('create') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@if (session('update'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes!</strong> {{ session('update') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@if (session('delete'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes!</strong> {{ session('delete') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
<div class="card">
    <div class="card-header">
        Liste des périodes

@can('periode_create')
    <div style="margin-bottom: 10px;" class="row  float-right">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.periodes.create") }}">
                <i class="fas fa-plus"></i> {{ trans('global.periode.title_singular') }}
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
                            {{ trans('global.periode.fields.name') }}
                        </th>
                        <th>
                            {{ trans('global.periode.fields.date_debut') }}
                        </th>
                        <th>
                            {{ trans('global.periode.fields.date_fin') }}
                        </th>
                        <th>
                            {{ trans('global.periode.fields.niveau_id') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($periodes as $key => $periode)
                        <tr data-entry-id="{{ $periode->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $periode->name ?? '' }}
                            </td>
                            <td>
                                {{ $periode->date_debut ?? '' }}
                            </td>
                            <td>
                                {{ $periode->date_fin ?? '' }}
                            </td>
                            <td>
                                {{ $periode->niveau->liblle ?? '' }}
                            </td>
                            <td>
                              <center>
                                @can('periode_show')
                                    <a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.periodes.show', $periode->id) }}">
                                       <i class="fas fa-eye"></i>
                                    </a>
                                @endcan
                                @can('periode_edit')
                                    <a class="btn btn-xs btn-info mr-2" href="{{ route('admin.periodes.edit', $periode->id) }}">
                                         <i class="fas fa-edit"></i>
                                    </a>
                                @endcan
                                @can('periode_delete')
                                    {{-- <form name="myForm" action="{{ route('admin.periodes.destroy', $periode->id) }}" method="POST"  style="display: inline-block;" onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button   type="submit" class="btn btn-xs btn-danger delete" > <i class="fas fa-trash"></i></button>
                                    </form> --}}
                                    <button class="btn btn-xs btn-danger remove-periode" data-id="{{ $periode->id }}" data-action="{{ route('admin.periodes.destroy', $periode->id) }}"> <i class="fas fa-trash "></i></button>

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
    url: "{{ route('admin.periodes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        swal.fire('{{ trans('global.datatables.zero_selected') }}','select a row','warning')

        return
      }
// 
Swal.fire({
       title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "error",
        icon: 'warning',
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Delete!',
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
@can('periode_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@parent
<script type="text/javascript">
  $("body").on("click",".remove-periode",async  function(){
    var current_object = $(this);
    // console.log(current_object);
    // return;
  const WillDelete = await  swal.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "error",
        icon: 'warning',
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Delete!',
    });
    if(WillDelete){
        if (WillDelete.isConfirmed) {      console.log(WillDelete.isConfirmed);
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');
          console.log(action);
          // return;
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