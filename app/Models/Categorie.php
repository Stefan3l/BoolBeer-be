<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //creo il colegamento con la tabella Beer
    public function beers()
    {
        return $this->hasMany(Beer::class);
    }
}
