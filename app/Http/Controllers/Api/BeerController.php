<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Beer;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index() {
        // prendo i dati dal database
        $beers = Beer::all()->map(function($beer) {
            return [
                ...$beer->toArray(),
                'image_url' => asset('storage/public/images' . $beer->image)
            ];
        });
        
        return response()->json([
            'succes'=> true,
            'data'=> $beers,
        ]);
        
    }

    public function show(Beer $beer) {
        //prendo i dati dal database tabella categories

        $beer->load('category');

        //aggiungo l'url dell'immagine
        $beerData = [
            ...$beer->toArray(),
            'image_url' => asset('storage/public/images/' . $beer->image)
        ];

        return response()->json([
            'succes'=>true,
            'data'=> $beerData,
        ]);
    }
   
}


