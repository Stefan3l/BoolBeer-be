<?php

use App\Http\Controllers\Api\BeerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get("beers", [BeerController::class, 'index']);
Route::get("beers/{beer}", [BeerController::class, 'show']);