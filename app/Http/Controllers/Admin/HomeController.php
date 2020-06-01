<?php

namespace App\Http\Controllers\Admin;
use App\Stagaire;
use App\Service;
use App\Stage;
use App\Periode;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {           
          $stagaire=Stagaire::all();
          $service=Service::all();
          $stage=Stage::all();
        return view('home',compact(['stagaire','service','stage']));
    }
}
