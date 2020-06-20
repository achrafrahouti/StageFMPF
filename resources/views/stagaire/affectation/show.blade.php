@extends('layouts.admin')
@section('content')
@if (session('succes'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Succes</strong>    {{ session('succes') }}!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif

 <div class="card">
     <div class="card-header"> 
      {{--   Liste des  Stagaire --}}
            @can('groupe_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-info" href="{{ url()->previous() }}">
                <i class="fas fa-arrow-circle-left"></i> retour
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
                            {{-- {{ trans('global.groupe.fields.name') }} --}}CNE
                        </th>
                        <th>
                            {{-- {{ trans('global.groupe.fields.groupe_tot') }} --}}Nom

                        </th>
                        <th>
                            {{-- {{ trans('global.groupe.fields.groupe_sh') }} --}}Prenom
                        </th>
                        <th>
                           Groupe
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stagaires as $key => $stagaire)
                        <tr data-entry-id="{{ '' }}">
                            <td>

                            </td>
                            <td>
                                {{ $stagaire->etudiant->cne ?? '' }}
                            </td>
                            <td>
                                {{ $stagaire->etudiant->nom ?? '' }}
                            </td>
                            <td>
                                {{ $stagaire->etudiant->prenom ?? '' }}
                            </td>
                            <td>
                                {{ $stagaire->groupe->name ?? '' }}
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