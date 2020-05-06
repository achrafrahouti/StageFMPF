@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.service.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.service.fields.name') }}
                    </th>
                    <td>
                        {{ $service->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.service.fields.capacite') }}
                    </th>
                    <td>
                        {{ $service->capacite }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.service.fields.lieu') }}
                    </th>
                    <td>
                        {{ $service->lieu }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection