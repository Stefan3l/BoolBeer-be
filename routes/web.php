<?php

use App\Http\Controllers\Admin\BeerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group( function () {

        
        Route::get('/beers', [BeerController::class, 'index'])->name('beers.index');
        Route::get('//beers/{beer}', [BeerController::class, 'show'])->name('beers.show');
        Route::get('/beers/edit/{beer}', [BeerController::class, 'edit'])->name('beers.edit');
        Route::put('/beers/{beer}', [BeerController::class, 'update'])->name('beers.update');
        Route::delete('/beers/{beer}', [BeerController::class, 'destroy'])->name('beers.destroy');
        
    });

   
    

require __DIR__.'/auth.php';
