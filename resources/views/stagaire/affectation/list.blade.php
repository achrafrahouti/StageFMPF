@extends('layouts.admin')
@section('content')

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes</strong>    affectation de {{ $niveau->liblle }} est terminé avec succes
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>


 <div class="card">
     <div class="card-header"> 
        {{-- Liste des  Stagaire --}}
        @can('groupe_create')
        <div style="margin-bottom: 10px;" class="row float-right">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("stagaire.affectation.index") }}">
                     Regrouper
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
                            {{-- {{ trans('global.groupe.fields.name') }} --}}
                            Nom
                        </th>
                        <th>
                            {{ trans('global.groupe.fields.groupe_tot') }}
                        </th>
                        <th>
                            {{ trans('global.groupe.fields.groupe_sh') }}
                        </th>
                        <th>
                            {{-- {{ trans('global.groupe.fields.groupe_sgh') }} --}}
                            Sous_sous groupe
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etudiants as $key => $etudiant)
                        <tr data-entry-id="{{ '' }}">
                            <td>

                            </td>
                            <td>
                                {{ $etudiant->cne ?? '' }}
                            </td>
                            <td>
                                {{ $etudiant->nom ?? '' }}
                            </td>
                            <td>
                                {{ $etudiant->prenom ?? '' }}
                            </td>
                            <td>
                                {{ $etudiant->stagaire->groupe->name ?? '' }}
                            </td>
                            <td>

                              <center>
                                @can('groupe_show')

                                @endcan
                                @can('groupe_edit')

                                @endcan
                                @can('groupe_delete')
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
  let deleteButtonTrans = ''
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('stagaire.affectation.show') }}",
    className: '',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        swal.fire('{{ trans('global.datatables.zero_selected') }}','','error')

        return
      }
// 
Swal.fire({
  title: 'Vous êtes sûr?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
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
  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection