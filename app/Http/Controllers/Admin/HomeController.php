<?php

namespace App\Http\Controllers\Admin;

use App\Periode;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
        $user=Auth::user()->profile;
        $groupe=$user->groupe;
        $stages=$groupe->stages;
        return view('home',compact('stages','groupe','user'));
    }
}
