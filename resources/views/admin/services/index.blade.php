@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Liste des services
        @can('service_create')
    <div style="margin-bottom: 10px;" class="row  float-right ">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.services.create") }}">
                <i class="fas fa-plus"></i> {{ trans('global.service.title_singular') }}
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
                                <center>
                                @can('service_show')
                                    <a class="btn btn-xs btn-primary mr-2" href="{{ route('admin.services.show', $service->id) }}">
                                         <i class="fas fa-eye"></i>
                                    </a>
                                @endcan
                                @can('service_edit')
                                    <a class="btn btn-xs btn-info mr-2" href="{{ route('admin.services.edit', $service->id) }}">
                                       <i class="fas fa-edit"></i>
                                    </a>
                                @endcan
                                @can('service_delete')
                                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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