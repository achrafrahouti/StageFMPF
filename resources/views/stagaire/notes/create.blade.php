@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{-- {{ trans('global.create') }} {{ trans('global.note.title_singular') }} --}}
       <h3 class="h1"> Insert Notes de                 {{ $stage->name }}</h3>

    </div>

    <div class="card-body">
        <form action="{{ route("stagaire.notes.store") }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <input type="hidden" name="stage" value="{{ $stage->id }}">
             {{-- //////////////////////////// --}}
             <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th width="10">
    
                            </th>
                            <th>
                                {{-- {{ trans('global.note.fields.stage') }} --}}
                                Nom
                            </th>
                            <th>
                                {{-- {{ trans('global.note.fields.note') }} --}}
                                Prenom
                            </th>
                            <th>
                                {{-- {{ trans('global.note.fields.note') }} --}}
                                Note
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stagaires as  $stagaire)
                            <tr data-entry-id="{{ $stagaire->id }}">
                                <td>
                                </td>
                                <td>
                                    {{ $stagaire->etudiant->nom ?? '' }}
                                </td>
                                <td>
                                    {{ $stagaire->etudiant->prenom ?? '' }}
                                </td>
                                <td>
                                    <input type="hidden" name="groupe[]" value="{{ $stagaire->id }}">
                                    <input type="double" name="notes[{{ $stagaire->id }}]" id="notes" value="{{ $stagaire->stages->where('id',$stage->id)->first()->pivot->note }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection