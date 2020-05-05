<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPeriodeRequest;
use App\Http\Requests\StorePeriodeRequest;
use App\Http\Requests\UpdatePeriodeRequest;
use Illuminate\Http\Request;
use App\Periode;

class PeriodesController extends Controller
{
    
    public function index()
    {
        abort_unless(\Gate::allows('periode_access'), 403);

        $periodes = Periode::all();

        return view('admin.periodes.index', compact('periodes'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('periode_create'), 403);

        return view('admin.periodes.create');
    }

    public function store(StorePeriodeRequest $request)
    {
        abort_unless(\Gate::allows('periode_create'), 403);

        $periode = Periode::create($request->all());

        return redirect()->route('admin.periodes.index');
    }

    public function edit(Periode $periode)
    {
        abort_unless(\Gate::allows('periode_edit'), 403);

        return view('admin.periodes.edit', compact('periode'));
    }

    public function update(UpdatePeriodeRequest $request, Periode $periode)
    {
        abort_unless(\Gate::allows('periode_edit'), 403);

        $periode->update($request->all());

        return redirect()->route('admin.periodes.index');
    }

    public function show(Periode $periode)
    {
        abort_unless(\Gate::allows('periode_show'), 403);

        return view('admin.periodes.show', compact('periode'));
    }

    public function destroy(Periode $periode)
    {
        abort_unless(\Gate::allows('periode_delete'), 403);

        $periode->delete();

        return back();
    }

    public function massDestroy(MassDestroyPeriodeRequest $request)
    {
        Periode::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
