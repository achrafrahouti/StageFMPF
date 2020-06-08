@extends('layouts.admin')
@section('content')
  <div class="card">
      <div class="card-header">
    @can('groupe_create')
    <div style="margin-bottom: 10px;" class="row float-right">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("stagaire.repartition.choix") }}">
                <i class="fas fa-plus"></i> {{ 'Repartir'}}
            </a>
        </div>
    </div>
     @endcan
    
        <div class="text-center text-danger"> {{ trans('global.list') }}{{ ' Des stagaire de niveau ' }}</div> 
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover ">
                <thead>
                    <tr>

                        <th>
                            {{-- {{ trans('global.note.fields.periode') }} --}}
                            Periodes
                        </th>
                        <th>
                            {{-- {{ trans('global.note.fields.periode') }} --}}
                            Stages
                        </th>
                        <th>
                           groupes
                        </th>
                       
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($periodes as $periode)
                        <tr>
                    
                           
                           <td rowspan="{{$periode->stages->unique()->count()+1}}">
                                {{ $periode->name ?? '' }}
                           </td>
                             @foreach($periode->stages->unique() as $stage)

                              @php
                                    $groupes=\DB::select('select * from groupes g,stage_groupe_periode p where p.periode_id= ? and p.stage_id=? and p.groupe_id=g.id',[$periode->id,$stage->id]);
                               @endphp
                               <tr>
                                    <td>
                                      {{ $stage->name?? '' }}
                                    </td>
                                <td> 
                              @foreach($groupes as $groupe)
                               {{$groupe->name}}<br> 
                              @endforeach
                                </td>
                               </tr>    
                             @endforeach
                           
                            <td>
                            
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