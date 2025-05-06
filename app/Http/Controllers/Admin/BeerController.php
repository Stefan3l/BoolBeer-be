<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beer;
use App\Models\Category;  // Add this import
use Illuminate\Http\Request;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // recupero tutte le birre dal db
        $beers = Beer::all();
        
        // dd($beers);
        // passo le birre alla view dashboard
        return view('admin.beers.index', compact('beers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Beer $beer)
    {   
        $beer = Beer::find($beer->id);
        $categories = Category::all();
        
        return view('admin.beers.show', compact('beer', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
