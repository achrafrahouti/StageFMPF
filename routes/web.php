<?php

use App\Http\Controllers\AffictationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::get('/achraf',function(){
    return view('welcome')->with('succes','submited !!');
})->name('achraf');
Route::get('/ana',function(){
    redirect()->route('achraf')->with('succes','submited !!');
})->name('ana');
Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::get('repartition','Stagaire\RepartitionController@choix')->name('stagaire.repartition.choix');


Route::group(['prefix' => 'stagaire','as' => 'stagaire.','namespace'=>'Stagaire','middleware'=>['auth']], function () {
    Route::get('notes','NotesController@index')->name('notes.index')->middleware('role:etudiant');
    Route::get('notes/choix','NotesController@choix')->name('notes.choix');
    Route::get('notes/create','NotesController@create')->name('notes.create');
    Route::post('notes','NotesController@store')->name('notes.store');
    Route::get('affictation','AffictationController@index')->name('affictation.index')->middleware('role:admin');
    Route::get('affictation/store','AffictationController@store')->name('affictation.store')->middleware('role:admin');
    Route::get('affictation/grouper','AffictationController@show')->name('affictation.show')->middleware('role:admin');
    Route::post('repartition/partitionner','RepartitionController@partitionner')->name('repartition.partitionner')->middleware('role:admin');
    Route::get('repartition/index','RepartitionController@index')->name('repartition.index');
    Route::get('repartition/{id}','RepartitionController@repartir')->name('repartition.repartir')->middleware('role:admin');

});

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
