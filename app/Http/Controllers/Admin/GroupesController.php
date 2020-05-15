<?php

namespace App\Http\Controllers\Admin;

use App\Groupe;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGroupeRequest;
use App\Http\Requests\StoreGroupeRequest;
use App\Http\Requests\UpdateGroupeRequest;
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

        return view('admin.groupes.create');
    }

    public function store(StoreGroupeRequest $request)
    {
        abort_unless(\Gate::allows('groupe_create'), 403);

        $groupe = Groupe::create($request->all());

        return redirect()->route('admin.groupes.index');
    }

    public function edit(groupe $groupe)
    {
        abort_unless(\Gate::allows('groupe_edit'), 403);

        return view('admin.groupes.edit', compact('groupe'));
    }

    public function update(UpdateGroupeRequest $request, Groupe $groupe)
    {
        abort_unless(\Gate::allows('groupe_edit'), 403);

        $groupe->update($request->all());

        return redirect()->route('admin.groupes.index');
    }

    public function show(Groupe $groupe)
    {
        abort_unless(\Gate::allows('groupe_show'), 403);

        return view('admin.groupes.show', compact('groupe'));
    }

    public function destroy(Groupe $groupe)
    {
        abort_unless(\Gate::allows('groupe_delete'), 403);

        $groupe->delete();

        return back();
    }

    public function massDestroy(MassDestroyGroupeRequest $request)
    {
        Groupe::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
