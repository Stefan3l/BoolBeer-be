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
    public function index(Request $request)
    {
        $query = Beer::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $beers = $query->orderBy('created_at', 'desc')->get();  // Changed from paginate() to get()
        
        return view('admin.beers.index', compact('beers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //recupero i datti delle birre
        $beers = Beer::all();

        //creo un nuovo oggetto per birra
        $beer = new Beer();

        //recupero le categorie dal db
        $categories = Category::all();

        //passo i dati alla view

        return view('admin.beers.create', compact(['beer', 'categories', 'beers']));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //prendo i dati dal form
        $data = $request->all();

        //creo una nuova birra
        $beer = new Beer();
        $beer->name = $data['name'];
        $beer->description = $data['description'];
        $beer->alcohol_content = $data['alcohol_content'];
        $beer->quantity = $data['quantity'];
        $beer->categorie_id = $data['categorie_id'];
        
        //se l'utente ha caricato un'immagine
        if(array_key_exists("image", $data)) {
            //ottengo il nome dell'immagine
            $nameImage = $data['image']->getClientOriginalName();

            // Salvo l'immagine nella cartella public/images
            $data['image']->storeAs('public/images', $nameImage);

            // Salvo solo il nome dell'immagine nel db
            $beer->image = $nameImage;
        }

        //salvo la birra nel db
        $beer->save();

        //reindirizzo alla pagina singolo al prodotto
        return redirect()->route('admin.beers.show', $beer);
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
        return redirect()->route('admin.beers.show', $beer);

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beer $beer)
    {
       
       
        //elimino il prodotto dal db
        $beer->delete();

        //faccio il redirect alla pagina principale
        return redirect()->route('admin.beers.index');
    }
}
