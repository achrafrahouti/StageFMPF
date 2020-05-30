@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="text-center text-danger"> {{ trans('global.list') }}{{ 'Des stagaire de niveau ' }}{{ $niveau->liblle }}</div> 
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{-- {{ trans('global.note.fields.stage') }} --}}
                            CNE
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
                            Groupe
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($etudiants as $etudiant)
                        <tr data-entry-id="{{ $etudiant->id }}">
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection