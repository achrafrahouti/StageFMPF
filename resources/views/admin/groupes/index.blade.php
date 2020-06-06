@extends('layouts.admin')
@section('content')
 
 <div class="card">
     <div class="card-header"> 
        Liste des groupes
            @can('groupe_create')
    <div style="margin-bottom: 10px;" class="row float-right">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.groupes.create") }}">
                <i class="fas fa-plus"></i> {{ trans('global.groupe.title_singular') }}
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
                            {{ trans('global.groupe.fields.name') }}
                        </th>
                        <th>
                            {{ trans('global.groupe.fields.groupe_tot') }}
                        </th>
                        <th>
                            {{ trans('global.groupe.fields.groupe_sh') }}
                        </th>
                        <th>
                            {{ trans('global.groupe.fields.groupe_sgh') }}
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
                                    <form action="{{ route('admin.groupes.destroy', $groupe->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
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
    url: "{{ route('admin.groupes.massDestroy') }}",
    className: 'btn-danger',
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
@can('groupe_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection