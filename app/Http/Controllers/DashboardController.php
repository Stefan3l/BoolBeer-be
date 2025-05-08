<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $beers = Beer::all();
        return view('dashboard', compact('beers'));
    }
}
