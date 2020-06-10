@extends('layouts.admin')
@section('content')
{{-- @can('demande_create')--}}
     
{{-- @endcan --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   {{session('success')}}
</div>
@elseif(session('danger'))
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   {{session('danger')}}
</div>
@elseif(session('updatesuccess'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   {{session('updatesuccess')}}
</div>
@elseif(session('updatedanger'))
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   {{session('updatedanger')}}
</div>
@endif
<div class="card">
    <div class="card-header">
        <i class="badge badge-dark">{{ trans('global.demande.title_singular') }} {{ trans('global.list') }}</i>
        <div style="margin-bottom: 10px;" class="row float-right">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("stagaire.demandes.create") }}">
                <i class=" fas fa-plus"></i>  {{ trans('global.demande.title_singular') }}
            </a>
        </div>
    </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                       
                        <th>
                            {{ trans('global.demande.fields.stage') }}
                        </th>
                    
                      
                        <th>
                            {{ trans('global.demande.fields.type') }}
                        </th>
                        <th>
                            Etat demande
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($demandes as $key => $demande)
                        <tr data-entry-id="{{ $demande->id }}">
                            <td>

                            </td>
                              <td class="text-center">
                                {{ $demande->stage->name ?? '' }}
                            </td>
                            <td>
                                {{ $demande->type_dem ?? '' }}
                            </td>
                             <td class="text-center">
                                @if($demande->demande_validé)
                                <span class="badge badge-success text-bold">Accepté</span>
                                @elseif(is_null($demande->demande_validé))
                                 <span class="badge badge-dark text-bold ">En cours</span>
                                 @else
                                 <span class="badge badge-danger text-bold">Réfusé</span>
                                 @endif
                            </td>
                            
                            <td>
                                <center>
                              @can('demande_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('stagaire.demandes.show', $demande->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                @endcan
                                @can('demande_edit')
                                @if(is_null($demande->demande_validé))
                                <a  class="btn btn-xs btn-info" href="{{ route('stagaire.demandes.edit', $demande->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endif
                                @if(!is_null($demande->demande_validé))
                                <a  class="btn btn-xs btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endif
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
    url: "{{ route('stagaire.demandes.massDestroy') }}",
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
@can('demande_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script> 
@endsection
@endsection