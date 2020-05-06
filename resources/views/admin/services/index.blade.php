@extends('layouts.admin')
@section('content')
@can('service_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.services.create") }}">
                {{ trans('global.add') }} {{ trans('global.service.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.service.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.service.fields.name') }}
                        </th>
                        <th>
                            {{ trans('global.service.fields.capacite') }}
                        </th>
                        <th>
                            {{ trans('global.service.fields.lieu') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $key => $service)
                        <tr data-entry-id="{{ $service->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $service->name ?? '' }}
                            </td>
                            <td>
                                {{ $service->capacite ?? '' }}
                            </td>
                            <td>
                                {{ $service->lieu ?? '' }}
                            </td>
                            <td>
                                @can('service_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.services.show', $service->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('service_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.services.edit', $service->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('service_delete')
                                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.services.massDestroy') }}",
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
@can('service_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection