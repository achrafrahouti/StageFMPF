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
        {{-- <i class="badge badge-dark">{{ trans('global.demande.title_singular') }} {{ trans('global.list') }}</i> --}}
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
                            {{-- {{ trans('global.first_name') }} --}}Nom
                        </th>
                        <th>
                        {{-- {{ trans('global.last_name') }} --}}Prenom
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
                            {{ trans('global.demande.fields.etat') }}
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

                                    <button class="btn btn-xs btn-danger remove-demande" data-id="{{ $demande->id }}" data-action="{{ route('admin.demandes.destroy', $demande->id) }}"> <i class="fas fa-trash "></i></button>

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
        swal.fire('{{ trans('global.datatables.zero_selected') }}','','warning')

        return
      }
// 
Swal.fire({
        title: "Vous êtes sûr?",
        text: "Vous ne pourrez pas récupérer cette ligne!",
        type: "error",
        icon: 'warning',
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',cancelButtonText:'Annuler',
        confirmButtonText: 'Supprimer!',
}).then((result) => {
  if (result.value) {
    $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
    Swal.fire({
      title:'Supprimé',
      text:'Votre ligne a été supprimé.',
      icon:'success',
      timer:3000
    })
  }
})
// 
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
async function accept(id,bool) {
    var demande_id=Number(id);
    if (demande_id) {
       const WillDelete=await swal.fire({
            title:"Vous êtes sûr ?",
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
{{-- mememememememememememememmeemememmememememememememememememememememememememem --}}
@parent
<script type="text/javascript">
  $("body").on("click",".remove-demande",async  function(){
    var current_object = $(this);
    // console.log(current_object);
    // return;
  const WillDelete = await  swal.fire({
        title: "Vous êtes sûr?",
        text: "Vous ne pourrez pas récupérer cette ligne!",
        type: "error",
        icon: 'warning',
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',cancelButtonText:'Annuler',
        confirmButtonText: 'Supprimer!',
    });
    if(WillDelete){
        if (WillDelete.isConfirmed) {      console.log(WillDelete.isConfirmed);
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');
            $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    }
});
</script>
@endsection
@endsection