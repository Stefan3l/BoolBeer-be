<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beer;
use App\Models\Category;  // Add this import
use Illuminate\Support\Facades\Storage;
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
    public function edit(Beer $beer)
    {
        //recupero la birra dal db
        $beers = Beer::all();

        //recupero le categorie dal db
        $categories = Category::all();

        return view('admin.beers.edit', compact(['beer', 'categories', 'beers']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beer $beer)
    {
        //salvo i dati che arrivano dal form
        $data = $request->all();

        //modifico le informazioni della birra
        $beer->name = $data['name'];
        $beer->description = $data['description'];
        $beer->alcohol_content = $data['alcohol_content'];
        $beer->quantity = $data['quantity'];
        $beer->categorie_id = $data['categorie_id'];
        
        //se l'utente ha caricato un'immagine
        if(array_key_exists("image", $data)) {
            //elimino l'immagine precedente
            Storage::delete('public/images/' . $beer->image);

            //ottengo il nome dell'immagine
            $nameImage = $data['image']->getClientOriginalName();

            // Salvo l'immagine nella cartella public/images
            $data['image']->storeAs('public/images', $nameImage);

            // Salvo solo il nome dell'immagine nel db
            $beer->image = $nameImage;



        }
        
        //salvo le modifiche nel db
        $beer->update();

        //reindirizzo alla pagina singolo al prodotto
        return redirect()->route('admin.beers.show', $beer)->with('message', 'La birra è stata aggiornata con successo');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
