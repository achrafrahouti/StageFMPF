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
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.demande.fields.cne') }}
                        </th>
                        <th>
                            {{ trans('global.user.fields.name') }}
                        </th>
                        <th>
                        {{ trans('global.user.fields.lastname') }}
                        </th>
                        <th>
                            {{trans('global.groupe.fields.niveau_id')}}
                        </th>
                        <th>
                            {{trans('global.groupe.fields.groupe_tot')}}
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
                    @if(!is_null($demande->demande_validé))
                        <tr data-entry-id="{{ $demande->id }}">
                            <td>

                            </td>
                            <td  class="text-center">
                                {{ $demande->stagaire->etudiant->cne ?? '' }}
                            </td>
                            <td class="text-center">
                                  {{ $demande->stagaire->etudiant->prenom ?? '' }}
                            </td>
                            <td class="text-center">
                                  {{ $demande->stagaire->etudiant->nom ?? '' }}
                            </td>
                            <td class="text-center">
                                  {{ $demande->stagaire->etudiant->niveau->liblle?? '' }}
                            </td>
                            <td class="text-center">
                                  {{ $demande->stagaire->groupe->name ?? '' }}
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
                            
                            <td width="100">
                                <center>
                              {{-- @can('demande_show') --}}
                                    <a class="btn btn-xs btn-primary "  href="{{ route('admin.demandes.show', $demande->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                  {{-- @can('demande_delete') --}}
                                    <form action="{{ route('admin.demandes.destroy', $demande->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                       <button type="submit" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                {{-- @endcan  --}}
                                

                                </center>
                            </td>

                        </tr>
                        @endif
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
    url: "{{ route('admin.demandes.massDestroy') }}",
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
<script>
    function setyes()
    { 
        
    }

async function accept(id,bool) {
    var demande_id=Number(id);
    if (demande_id) {
       const WillDelete=await swal.fire({
            title:"are you sure ?",
            type:'warning',
            showCancelButton:true,

        });
       if (WillDelete.isConfirmed){
        $.ajax({
            url:'demandes/accepte/'+demande_id+'/'+bool,
            method:'POST',
            headers:{'x-csrf-token':_token},
            success:function(response){
                if(bool==1){
                var myElement=$("#Etat_"+id);
         myElement.html("<i class='badge badge-success'>acceptée</i>");
         swal.fire('demande acceptée');
                       }
        else{
        var myElement=$("#Etat_"+id);
        myElement.html("<i class='badge badge-danger'>refusée</i>");
        swal.fire('demande refusée');
            }
                    
            }
        })
      } 
    }
    console.log(id);
  }
    

</script>
@endsection
@endsection