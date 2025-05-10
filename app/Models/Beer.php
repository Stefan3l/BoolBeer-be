<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    //creo il collegamento con la tabella Categorie
    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }
}
