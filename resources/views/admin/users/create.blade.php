@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{-- {{ trans('global.create') }} {{ trans('global.user.title_singular') }} --}}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">
                <label for="nom">{{-- {{ trans('global.user.fields.name') }} --}}Nom*</label>
                <input type="text" id="nom" name="nom" class="form-control" >
                @if($errors->has('nom'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nom') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.name_helper') }}
                </p>
            </div>
            {{-- last_name --}}
            <div class="form-group {{ $errors->has('prenom') ? 'has-error' : '' }}">
                <label for="prenom">{{-- {{ trans('global.user.fields.lastname') }} --}}Prenom*</label>
                <input type="text" id="prenom" name="prenom" class="form-control">
                @if($errors->has('prenom'))
                    <em class="invalid-feedback">
                        {{ $errors->first('prenom') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.lastname_helper') }}
                </p>
            </div>
            {{-- end last_name --}}
            {{-- service --}}
     <div class="form-group {{ $errors->has('service_id') ? 'has-error' : '' }}">
                <label for="service_id">{{ trans('global.stage.fields.services') }}*</label>
                <select name="service_id" id="service_id" class="form-control select2" >
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
                <p class="helper-block">
                    {{ trans('global.stage.fields.services_helper') }}
                </p>
            {{-- end service --}}
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('global.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control">
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{-- {{ trans('global.user.fields.password') }} --}}Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control">
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.password_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                <label for="roles">{{ trans('global.user.fields.roles') }}*</label>
                <select name="roles[]" id="roles" class="form-control select2">
                    @foreach($roles as $id => $role)
                        <option value="{{$id}}">
                            {{ $role }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <em class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.roles_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection