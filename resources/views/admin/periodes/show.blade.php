@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.periode.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.periode.fields.name') }}
                    </th>
                    <td>
                        {{ $periode->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.periode.fields.date_debut') }}
                    </th>
                    <td>
                        {!! $periode->date_debut !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.periode.fields.date_fin') }}
                    </th>
                    <td>
                        {{ $periode->date_fin }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.periode.fields.niveau_id') }}
                    </th>
                    <td>
                        {{ $periode->niveau->liblle }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection