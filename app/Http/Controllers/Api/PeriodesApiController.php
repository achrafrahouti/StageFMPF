<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePeriodeRequest;
use App\Http\Requests\UpdatePeriodeRequest;
use App\Periode;

class PeriodesApiController extends Controller
{
    public function index()
    {
        $periodes = Periode::all();

        return $periodes;
    }

    public function store(StorePeriodeRequest $request)
    {
        return Periode::create($request->all());
    }

    public function update(UpdatePeriodeRequest $request, Periode $periode)
    {
        return $periode->update($request->all());
    }

    public function show(Periode $periode)
    {
        return $periode;
    }

    public function destroy(Periode $periode)
    {
        return $periode->delete();
    }
}
