<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creazione per riempire la tabella categories
        $newCategory = new Categorie();
        $newCategory->type_name = 'Tipo 1';
        $newCategory->type_color = 'Rosso';
        $newCategory->save();
    }
}
