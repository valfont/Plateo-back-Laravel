<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DemandeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route admin
Route::resource('admin', AdminController::class);
// Routes resource pour l'ajout et l'affichage des artisans 
Route::resource('artisan', ArtisanController::class);
//  Routes api Clients 
Route::resource('client', ClientController::class);
//  Routes api Demandes
Route::resource('demande', DemandeController::class);