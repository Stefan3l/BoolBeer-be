<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //controllo per la dashboard
    public function index()
    {
        return view('profile.dashboard');
    }
}
