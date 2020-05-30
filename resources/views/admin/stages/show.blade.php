@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.stage.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.stage.fields.name') }}
                    </th>
                    <td>
                        {{ $stage->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Services
                    </th>
                    <td>
                        {{-- @foreach($stage->service as $id => $services) --}}
                            <span class="label label-info label-many">{{ $stage->service->name }}</span>
                        {{-- @endforeach --}}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{-- {{ trans('global.stage.fields.name') }} --}}
                        Niveau
                    </th>
                    <td>
                        {{ $stage->niveau->liblle }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection