@extends('layouts.admin')
@section('content')
  @can('groupe_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.groupes.create") }}">
                {{ trans('global.add') }} {{ trans('global.groupe.title_singular') }}
            </a>
        </div>
    </div>
  @endcan
 <div class="card">
     <div class="card-header">
        {{ trans('global.groupe.title_singular') }} {{ trans('global.list') }}
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
                                @can('groupe_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.groupes.show', $groupe->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('groupe_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.groupes.edit', $groupe->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('groupe_delete')
                                    <form action="{{ route('admin.groupes.destroy', $groupe->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
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
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
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