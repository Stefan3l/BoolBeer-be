<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    //creo il collegamento con la tabella Categorie
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
