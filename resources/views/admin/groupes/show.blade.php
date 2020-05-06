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
            </tbody>
        </table>
    </div>
</div>

@endsection