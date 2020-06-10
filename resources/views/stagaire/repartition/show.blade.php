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
@if (session('error'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>échec</strong>    {{ session('error') }}!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

@endif
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong > S’il vous plait veuillez choisir un niveau pour voir sa répartition  </strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  <div class="card">
      <div class="card-header">
        <div class="container-sm text-center">
           <h1 class="badge badge-dark text-bold">{{ 'Planing  des Stages ' }}  </h1>
</div>
    @can('groupe_create')
    <div style="margin-bottom: 10px;" class="row float-right">
      <div class="col-lg-12">
          <a class="btn btn-success" href="{{ route("stagaire.repartition.choix") }}">
              <i class="fas fa-plus"></i> {{ 'Repartir'}}
          </a>
      </div>
  </div>
    <form action="{{ route('stagaire.repartition.show') }}" method="GET" enctype="multipart/form-data">
      <div class="form-group {{ $errors->has('niveau_id') ? 'has-error' : '' }}">
        <div class="row ">
          <label class="text-right col-sm-2" for="niveau_id"><strong class="text-secondary"> {{ trans('global.periode.fields.niveau_id') }} :</strong></label>
          <select name="niveau_id" id="niveau_id" class=" col-sm-3 custom-select custom-select-sm " onchange="set(this.value);">
              <option selected>{{ trans('global.repartition.fields.choix') }}</option>
              @foreach($niveaux as $id => $niveau)
                  <option id="niveau_id" value="{{ $niveau->id }}">
                      {{ $niveau->liblle }}
                  </option>
              @endforeach
          <p class="helper-block"></p>
              {{ trans('global.repartition.fields.niveau_id_helper') }}
          </p>
          </select>
         <button class="btn btn-info mx-3 py-0 px-3" type="submit"><i class="fa fa-search"></i></button>
        </div>
      </div>
  </form>

     @endcan
    


        <div class="text-center "> </div> 
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover ">
                <thead>
                    <tr>

                        <th class="text-center">
                            {{-- {{ trans('global.note.fields.periode') }} --}}
                            Periodes
                        </th>
                        <th class="text-center">
                            {{-- {{ trans('global.note.fields.periode') }} --}}
                            Stages
                        </th>
                        <th class="text-center">
                           groupes
                        </th>
                       
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                  @php
                  $periodes=App\Periode::where('niveau_id',$niveau->id)->get();
                  @endphp
                    @foreach($periodes as $periode)
                        <tr>
                    
                           
                           <td rowspan="{{$periode->stages->unique()->count()+1}}">
                            <strong>
                               <center > <h3 class="badge badge-danger">{{ $periode->name ?? '' }}</h3> <hr><br> <br> <br><br> </center>
                               <center ><p class="badge badge-dark"> {{ $periode->date_debut ?? '' }} <i class=" 	fa fa-long-arrow-right"></i>
                               {{ $periode->date_fin ?? '' }} </p></center>
                            </strong>
                              </td>
                             @foreach($periode->stages->unique() as $stage)

                              @php
                                    $groupes=\DB::select('select * from groupes g,stage_groupe_periode p where p.periode_id= ? and p.stage_id=? and p.groupe_id=g.id',[$periode->id,$stage->id]);
                               @endphp
                               <tr>
                                    <td class="text-center">
                                     <strong class="text-bold"> {{ $stage->name?? '' }}</strong>
                                    </td>
                                <td class="text-center"> 
                              @foreach($groupes as $groupe)
                               <span class="badge badge-light">{{$groupe->name}}</span><br> 
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
let deleteButtonTrans = ''
let deleteButton = {
  text: deleteButtonTrans,
  url: "{{ route('stagaire.affictation.show') }}",
  className: '',
  action: function (e, dt, node, config) {
    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
        return $(entry).data('entry-id')
    });

    if (ids.length === 0) {
      swal.fire('{{ trans('global.datatables.zero_selected') }}','select a row','error')

      return
    }
// 
Swal.fire({
title: 'Are you sure?',
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
    titlt:'Deleted!',
    text:'Your file has been deleted.',
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