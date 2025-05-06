<?php

namespace Database\Seeders;

use App\Models\Beer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creazione per riempire la tabella beers
        $newBeer = new Beer();
        $newBeer->name = 'Birra 1';
        $newBeer->description = 'Descrizione della birra 1';
        $newBeer->alcohol_content = 5;
        $newBeer->quantity = 10;
        $newBeer->image = 'https://example.com/image1.jpg';
        $newBeer->rating = 4;
        $newBeer->categorie_id = 1; // Associa la birra alla categoria con ID 1
        $newBeer->save();
    }
}
