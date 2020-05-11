@extends('layouts.admin')
@section('content')
@can('note_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            {{-- <a class="btn btn-success" href="{{ route("admin.notes.create") }}"> --}}
                {{-- {{ trans('global.add') }} {{ trans('global.note.title_singular') }} --}}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{-- {{ trans('global.note.title_singular') }} {{ trans('global.list') }} --}}
        Notes
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            CNE
                            {{-- {{ trans('global.note.fields.title') }} --}}
                        </th>
                        <th>
                            Nom D'etudiant
                            {{-- {{ trans('global.note.fields.permissions') }} --}}
                        </th>
                        <th>
                            Notes
                            {{-- {{ trans('global.note.fields.permissions') }} --}}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                             
                    @foreach(App\Stage::where('name','Chirurgie A')->first()->lignestages as $lignestage)
                        <tr data-entry-id="{{ $lignestage->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $lignestage->etudiant->cne ?? '' }}
                            </td>
                            <td>
                                {{ $lignestage->etudiant->nom ?? '' }}
                                {{ $lignestage->etudiant->prenom ?? '' }}
                                {{-- @foreach($note->permissions as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach --}}
                            </td>
                            <td>
                                {{ $lignestage->pivot->note ?? '' }}
                            </td>
                            {{-- <td>
                                @can('note_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.notes.show', $note->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('note_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.notes.edit', $note->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('note_delete')
                                    <form action="{{ route('admin.notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td> --}}

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@section('scripts')
@parent
{{-- <script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.notes.massDestroy') }}",
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
@can('note_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
}) --}}

</script>
@endsection
@endsection