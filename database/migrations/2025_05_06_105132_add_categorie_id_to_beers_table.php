<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('beers', function (Blueprint $table) {
            //aggiungo la colonna categorie_id alla tabella beers
            $table->foreignId('categorie_id')
                ->constrained('categories')
                ->onDelete('cascade')
                ->after('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beers', function (Blueprint $table) {

            //cancello la foreign key
            $table->dropForeign(['categorie_id']);

            
            //cancello la colonna categorie_id dalla tabella beers
            $table->dropColumn('categorie_id');
        });
    }
};
