@extends('layouts.admin')
@section('content')
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
                                    <form name="myForm" action="{{ route('admin.periodes.destroy', $periode->id) }}" method="POST"  style="display: inline-block;" onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button onclick="deleteConfirmation({{ $periode->id }})"  type="submit" class="btn btn-xs btn-danger delete" > <i class="fas fa-trash"></i></button>
                                    </form>
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
        // alert('{{ trans('global.datatables.zero_selected') }}')
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
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
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
@endsection
@endsection