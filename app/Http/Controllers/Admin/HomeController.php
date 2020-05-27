<?php

namespace App\Http\Controllers\Admin;

use App\Periode;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
    
        return view('home');
    }
}
