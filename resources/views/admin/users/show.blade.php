@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       {{--  {{ trans('global.show') }} {{ trans('global.user.title') }} --}}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{-- {{ trans('global.user.fields.name') }} --}}Nom
                    </th>
                    <td>
                        {{Auth::user()->profile->nom }}
                    </td>
                </tr>
                 <tr>
                    <th>
                        {{-- {{ trans('global.user.fields.name') }} --}}Prenom
                    </th>
                    <td>
                        {{Auth::user()->profile->prenom }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.user.fields.email') }}
                    </th>
                    <td>
                        {{ $user->email }}
                    </td>
                </tr>
                    <th>
                        Roles
                    </th>
                    <td>
                        @foreach($user->roles as $id => $roles)
                            <span class="label label-info label-many">{{ $roles->title }}</span>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection