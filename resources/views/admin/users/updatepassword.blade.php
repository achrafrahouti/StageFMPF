@extends('layouts.admin')
@section('content')
@php
 $user=Auth::user();
@endphp
@if(session('erreur1'))
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   {{session('erreur1')}}
</div>
@endif
@if(session('erreur2'))
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   {{session('erreur2')}}
</div>
@endif
@if(session('success'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
   {{session('success')}}
</div>
@endif
<div class="card">
	<div class="card-body" >
		<i class="badge badge-danger   float-right  mx-2">modifié le {{$user->updated_at}}</i>
    <i class="badge badge-success float-right">crée le {{$user->created_at}}</i>
    
    </div>
    <div  class="row">
    
    	@if($user->isEtudiant())  
    	<div class="col-md-4 offset-md-2">
    	  <hr>
    	<h4 class="pr-3 d-inline">{{$user->profile->etudiant->nom}} {{$user->profile->etudiant->prenom}}</h4><span class="badge badge-primary">etudiant</span>
    	    <hr>
          </div>
           <div class="col-md-4">
         	 <hr>
         	  <h4><i class="fas fa-edit"></i>changer mot de passe</h4>
         	 <hr>
         	 <hr>
         <form action="{{ route("admin.users.updatep") }}" method="POST" enctype="multipart/form-data">
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            	 @csrf
                 @method('PUT')
                <label for="password">Mot de passe</label>
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
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" id="password" name="passwordn" class="form-control">
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.password_helper') }}
                </p>
            </div>
             <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">confirmé mot de passe</label>
                <input type="password" id="password" name="passwordc" class="form-control">
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.password_helper') }}
                </p>
                <input type="hidden" name="user_id" value="{{$user->id}}">
            </div>
             <button class="btn btn-outline-info"><i class="fas fa-edit"> Modifier</i></button>
           </form>
            <hr>
         </div>
    	@elseif($user->isEncadrant()) 
    	<div class="col-md-4 offset-md-2">
    	<hr>
        <h4 class="pr-3 d-inline">{{$user->profile->nom}} {{$user->profile->prenom}}</h4><span class="badge badge-primary">encadrant</span>
<hr>
          </div>
           <div class="col-md-4">
         	 <hr>
         	  <h4><i class="fas fa-edit"></i>changer mot de passe</h4>
         	 <hr>
         	 <hr>
         <form action="{{ route("admin.users.updatep") }}" method="POST" enctype="multipart/form-data">
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            	 @csrf
                 @method('PUT')
                <label for="password">Mot de passe</label>
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
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" id="password" name="passwordn" class="form-control">
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.password_helper') }}
                </p>
            </div>
             <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">confirmé mot de passe</label>
                <input type="password" id="password" name="passwordc" class="form-control">
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.password_helper') }}
                </p>
                <input type="hidden" name="user_id" value="{{$user->id}}">
            </div>
             <button class="btn btn-outline-info"><i class="fas fa-edit"> Modifier</i></button>
           </form>
            <hr>
         </div>
        @elseif($user->isSecretaire()) 
        <div class="col-md-4 offset-md-2">
    	<hr>
        <h4 class="pr-3 d-inline">{{$user->profile->nom}} {{$user->profile->prenom}}</h4><span class="badge badge-primary">secretaire</span>
         <hr>
          </div>
           <div class="col-md-4">
         	 <hr>
         	  <h4><i class="fas fa-edit"></i>changer mot de passe</h4>
         	 <hr>
         	 <hr>
         <form action="{{ route("admin.users.updatep") }}" method="POST" enctype="multipart/form-data">
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            	 @csrf
                 @method('PUT')
                <label for="password">Mot de passe</label>
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
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" id="password" name="passwordn" class="form-control">
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.password_helper') }}
                </p>
            </div>
             <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">confirmé mot de passe</label>
                <input type="password" id="password" name="passwordc" class="form-control">
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.password_helper') }}
                </p>
                <input type="hidden" name="user_id" value="{{$user->id}}">
            </div>
             <button class="btn btn-outline-info"><i class="fas fa-edit"> Modifier</i></button>
           </form>
            <hr>
         </div>
        @elseif($user->isAdmin()) 
        <div class="col-md-4 offset-md-2">
    	<hr>
        <h4 class="pr-3 d-inline">{{$user->profile->nom}} {{$user->profile->prenom}}</h4><span class="badge badge-primary">Administrateur</span>
         <hr>
          </div>
           <div class="col-md-4">
         	 <hr>
         	  <h4><i class="fas fa-edit"></i>changer mot de passe</h4>
         	 <hr>
         	 <hr>
         <form action="{{ route("admin.users.updatep") }}" method="POST" enctype="multipart/form-data">
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            	 @csrf
                 @method('PUT')
                <label for="password">Mot de passe</label>
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
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" id="password" name="passwordn" class="form-control">
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.password_helper') }}
                </p>
            </div>
             <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">confirmé mot de passe</label>
                <input type="password" id="password" name="passwordc" class="form-control">
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.user.fields.password_helper') }}
                </p>
                <input type="hidden" name="user_id" value="{{$user->id}}">
            </div>
             <button class="btn btn-outline-info"><i class="fas fa-edit"> Modifier</i></button>
           </form>
            <hr>
         </div>
    	@endif
    
</div>
@endsection