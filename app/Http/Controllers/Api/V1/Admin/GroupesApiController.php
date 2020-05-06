<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Groupe;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupeRequest;
use App\Http\Requests\UpdateGroupeRequest;

class GroupesApiController extends Controller
{
    public function index()
    {
        $groupes = Groupe::all();

        return $groupes;
    }

    public function store(StoreGroupeRequest $request)
    {
        return Groupe::create($request->all());
    }

    public function update(UpdateGroupeRequest $request, Groupe $groupe)
    {
        return $groupe->update($request->all());
    }

    public function show(Groupe $groupe)
    {
        return $groupe;
    }

    public function destroy(Groupe $groupe)
    {
        return $groupe->delete();
    }
}
