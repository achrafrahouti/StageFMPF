<?php

namespace App\Http\Controllers\Admin;
use App\Stagaire;
use App\Periode;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
          $stagaire=Stagaire::all();
        return view('home',compact('stagaire'));
    }
}
