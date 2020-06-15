@extends('layouts.app1')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        <h1>
                            <div class="login-logo">
                                <center class="text-info">
                                    {{ trans('global.site_title') }}
                                </center>
                            </div>
                        </h1>
                        <p class="text-muted"></p>
                        <div>
                            <input name="token" value="{{ $token }}" type="hidden">
                            <div class="form-group has-feedback">
                                <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" required="required" placeholder="{{ trans('global.login_email') }}">
                                @if($errors->has('email'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </em>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" required="required" placeholder="{{ trans('global.login_password') }}">
                                @if($errors->has('password'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </em>
                                @endif
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" name="password_confirmation" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" required="required" placeholder="{{ trans('global.login_password_confirmation') }}">
                                @if($errors->has('password_confirmation'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('password_confirmation') }}
                                    </em>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">
                                    {{-- {{ trans('global.reset_password') }} --}}
                                    Recuperer mot de passe
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
