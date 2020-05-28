@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.groupe.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.groupe.fields.name') }}
                    </th>
                    <td>
                        {{ $groupe->name }}
                    </td>
                </tr>

                <tr>
                    <th>
                            {{ trans('global.groupe.fields.groupe_tot') }}
                    </th>
                    <td>
                        {{ $groupe->groupe_tot }}
                    </td>
                </tr>
                <tr>
                    <th>
                            {{ trans('global.groupe.fields.groupe_sh') }}
                    </th>
                    <td>
                        {{ $groupe->groupe_sh }}
                    </td>
                </tr>
                <tr>
                    <th>
                            {{ trans('global.groupe.fields.groupe_sgh') }}
                    </th>
                    <td>
                        {{ $groupe->groupe_sgh }}
                    </td>
                </tr>
                <tr>
                    <th>
                            {{-- {{ trans('global.groupe.fields.groupe_tot') }} --}}
                            Niveau
                    </th>
                    <td>
                        {{ $groupe->niveau->liblle }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection