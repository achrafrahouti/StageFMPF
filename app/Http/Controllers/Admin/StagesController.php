<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStageRequest;
use App\Http\Requests\StoreStageRequest;
use App\Http\Requests\UpdateStageRequest;
use App\Niveau;
use App\Service;
use App\Stage;
use Illuminate\Http\Request;

class StagesController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('stage_access'), 403);

        $stages = Stage::all();

        return view('admin.stages.index', compact('stages'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('stage_create'), 403);

        $services = Service::all()->pluck('name', 'id');
        $niveaux=Niveau::all();

        return view('admin.stages.create', compact('services','niveaux'));
    }

    public function store(StoreStageRequest $request)
    {
        abort_unless(\Gate::allows('stage_create'), 403);

        $stage = Stage::create($request->all());

        return redirect()->route('admin.stages.index')->with('create', 'Stage a été créé ');
    }

    public function edit(Stage $stage)
    {
        abort_unless(\Gate::allows('stage_edit'), 403);

        $services = Service::all()->pluck('name', 'id');
        $niveaux=Niveau::all();
        $stage->load('service');
        return view('admin.stages.edit', compact('services','niveaux', 'stage'));
    }

    public function update(UpdateStageRequest $request, Stage $stage)
    {
        abort_unless(\Gate::allows('stage_edit'), 403);
        $stage->update($request->all());
        // $stage->service()->sync($request->input('services', []));

        return redirect()->route('admin.stages.index')->with(['update'=> 'Stage a été modifié']);
    }

    public function show(Stage $stage)
    {
        abort_unless(\Gate::allows('stage_show'), 403);

        $stage->load('service');

        return view('admin.stages.show', compact('stage'));
    }

    public function destroy(Stage $stage)
    {
        abort_unless(\Gate::allows('stage_delete'), 403);

        $stage->delete();

        return back()->with('delete', 'Stage a été supprimé');
    }

    public function massDestroy(MassDestroyStageRequest $request)
    {
        Stage::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
