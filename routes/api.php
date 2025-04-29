<?php

use App\Http\Controllers\PasingwasteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/wastedata', [PasingwasteController::class, 'PasingData']);
route::get('/allwasteitem', [PasingwasteController::class , 'getAllWasteItem']);