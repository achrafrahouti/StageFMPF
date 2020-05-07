<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('periodes/destroy', 'PeriodesController@massDestroy')->name('periodes.massDestroy');

    Route::resource('periodes','PeriodesController');

    Route::delete('groupes/destroy', 'GroupesController@massDestroy')->name('groupes.massDestroy');

    Route::resource('groupes','GroupesController');

    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');

    Route::resource('services','ServicesController');

    Route::delete('stages/destroy', 'StagesController@massDestroy')->name('stages.massDestroy');

    Route::resource('stages','StagesController');

});
