<?php

use App\Http\Controllers\affectationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::get('repartition','Stagaire\RepartitionController@choix')->name('stagaire.repartition.choix');
Route::get('affectation','Stagaire\affectationController@choix')->name('affectation.choix')->middleware('role:admin');    
Route::get('notes','Stagaire\NotesController@show')->name('notes.ajax');    //middleware
Route::get('make','Admin\UsersController@storeStagaire');

Route::group(['prefix' => 'stagaire','as' => 'stagaire.','namespace'=>'Stagaire','middleware'=>['auth']], function () {
    Route::get('notes','NotesController@index')->name('notes.index')->middleware('role:etudiant');
    Route::get('notes/create','NotesController@create')->name('notes.create');
    Route::post('notes','NotesController@store')->name('notes.store');
    Route::get('getinfo/{id}','NotesController@ajax')->name('notes.getinfo');
    Route::get('getinfoAdmin/{id}','NotesController@adminajax')->name('notes.getinfoAdmin');

    Route::get('affectation','affectationController@index')->name('affectation.index')->middleware('role:admin');
    Route::post('affectation/afficher','affectationController@afficher')->name('affectation.afficher')->middleware('role:admin');
    Route::get('affectation/store','affectationController@store')->name('affectation.store')->middleware('role:admin');
    Route::get('affectation/grouper','affectationController@show')->name('affectation.show')->middleware('role:admin');
    Route::get('affectation/list','affectationController@list')->name('affectation.list')->middleware('role:admin');
    Route::get('affecter/{id}','affectationController@affecter')->name('affectation.affecter')->middleware('role:admin');

    
    Route::post('repartition/partitionner','RepartitionController@partitionner')->name('repartition.partitionner')->middleware('role:admin');
    Route::get('repartition/show','RepartitionController@show')->name('repartition.show');

    Route::get('getStagaires/stagaire','RepartitionController@synch')->name('repartition.synch');
    Route::get('getStagaires/synchroniser','RepartitionController@synchroniser')->name('synchroniser');
    Route::get('getStagaires/{id}','RepartitionController@getStagaires')->name('getStagaires');

    Route::get('getPeriode/{id}','RepartitionController@getPeriode')->name('getPeriode');
    Route::get('repartition/{id}','RepartitionController@repartir')->name('repartition.repartir')->middleware('role:admin');

    Route::get('Attestation/print/{id}','DemandeController@print')->name('attestation.print');
    Route::delete('demandes/destroy', 'DemandeController@massDestroy')->name('demandes.massDestroy'); 
    Route::resource('demandes','DemandeController');

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
    
     Route::delete('demandes/destroy', 'DemandeController@massDestroy')->name('demandes.massDestroy');
    Route::resource('stages','StagesController');
    Route::get('demande/demandeverifiees','DemandeController@indexv')->name('demandes.indexv');

    Route::resource('demandes','DemandeController');
    Route::post('demandes/accepte/{id}/{bool}','DemandeController@accepter');

    Route::delete('etudiants/destroy', 'StagaireController@massDestroy')->name('etudiants.massDestroy');
    Route::get('etudiants/makes','StagaireController@store')->name('etudiants.make');
    Route::resource('etudiants', 'StagaireController')->except(['create','store','show','edit','update']);
    Route::get('user/password','StagaireController@updatepassword')->name('users.password');
    Route::put('user/updatep','StagaireController@updatep')->name('users.updatep');

});
