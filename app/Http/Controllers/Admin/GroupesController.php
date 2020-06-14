<?php

namespace App\Http\Controllers\Admin;

use App\Groupe;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGroupeRequest;
use App\Http\Requests\StoreGroupeRequest;
use App\Http\Requests\UpdateGroupeRequest;
use App\Niveau;
use Illuminate\Http\Request;

class GroupesController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role');
    }
    public function index()
    {
        abort_unless(\Gate::allows('groupe_access'), 403);

        $groupes = Groupe::all();

        return view('admin.groupes.index', compact('groupes'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('groupe_create'), 403);
        $niveaux=Niveau::all();
        return view('admin.groupes.create',compact('niveaux'));
    }

    public function store(StoreGroupeRequest $request)
    {
        abort_unless(\Gate::allows('groupe_create'), 403);

        $groupe = Groupe::create($request->all());

        return redirect()->route('admin.groupes.index')->with('create', 'Groupe a été créé');
    }

    public function edit(groupe $groupe)
    {
        abort_unless(\Gate::allows('groupe_edit'), 403);
        $niveaux=Niveau::all();
        return view('admin.groupes.edit', compact('groupe','niveaux'));
    }

    public function update(UpdateGroupeRequest $request, Groupe $groupe)
    {
        abort_unless(\Gate::allows('groupe_edit'), 403);

        $groupe->update($request->all());

        return redirect()->route('admin.groupes.index')->with('update', 'Groupe a été modifié');
    }

    public function show(Groupe $groupe)
    {
        abort_unless(\Gate::allows('groupe_show'), 403);

        return view('admin.groupes.show', compact('groupe'));
    }

    public function destroy(Request $request,$id)
    {
        abort_unless(\Gate::allows('groupe_delete'), 403);

        Groupe::where('id',$id)->delete();

        return back()->with('delete', 'Groupe a été supprimé');
    }
    


    public function massDestroy(MassDestroyGroupeRequest $request)
    {
        Groupe::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
