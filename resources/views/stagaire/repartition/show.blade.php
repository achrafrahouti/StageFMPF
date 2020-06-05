@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-header">
        <div class="text-center text-danger"> {{ trans('global.list') }}{{ ' Des stagaire de niveau ' }}</div> 
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable ">
                <thead>
                    <tr>
                        <th width="10">
@php
    
@endphp
                        </th>
                        <th>
                            {{-- {{ trans('global.note.fields.periode') }} --}}
                            Periode
                        </th>
                        <th>
                            {{-- {{ trans('global.note.fields.periode') }} --}}
                            periode
                        </th>
                        <th>
                            {{-- {{ trans('global.note.fields.note') }} --}}
                            Groupes
                        </th>
                        <th>
                            {{-- {{ trans('global.note.fields.note') }} --}}
                            Groupe
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($periodes as $periode)
                        <tr>
                            {{-- if last == courant {passer iteration} --}}
                            <td>

                            </td>
                            <td>
                                {{ $periode->name ?? '' }}
                            </td>
                            <td>
                                {{ $periode->stages ?? '' }}
                            </td>
                            <td>
                                {{-- @php
                                   $groupes= \DB::select('select groupe_id from periode_groupe_periode where periode_id= ? and periode_id = ?',[$periode->periode_id,$periode->periode_id]);
                                @endphp
                                @foreach ($groupes as $groupe)
                                    {!! $groupe->groupe_id !!}
                                @endforeach --}}
                                    {{ $periode->groupes }}
                            </td>
                            <td>
                                {{-- {{ $periode->stagaire->groupe->name ?? '' }} --}}
                            </td>
                            <td>
                                @can('groupe_show')

                                @endcan
                                @can('groupe_edit')

                                @endcan
                                @can('groupe_delete')

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
  let deleteButtonTrans = '{{ '' }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('stagaire.affictation.show') }}",
    className: '',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return
      });

      if (ids.length === 0) {
        
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