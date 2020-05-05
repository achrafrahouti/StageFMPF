@extends('layouts.admin')
@section('content')
@can('periode_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.periodes.create") }}">
                {{ trans('global.add') }} {{ trans('global.periode.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.periode.title_singular') }} {{ trans('global.list') }}
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
                                @can('periode_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.periodes.show', $periode->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('periode_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.periodes.edit', $periode->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('periode_delete')
                                    <form action="{{ route('admin.periodes.destroy', $periode->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.periodes.massDestroy') }}",
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
@can('periode_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection