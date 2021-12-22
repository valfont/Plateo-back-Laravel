<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\MagicLoginController;


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
                    // ******Routes API Admins*****//

Route::middleware('auth:sanctum')->get('/admin', function (Request $request) {
    return $request->admin();
});
// enregistrement d'un compte utilisateur Admin
Route::post('/admin-register', [AdminController::class, 'register']);
// login
Route::post('/admin-login', [AdminController::class, 'login']);



                        // ******Routes API Artisans*****//

// Route pour ajout et affichage des artisans
Route::resource('/artisan', ArtisanController::class);
// Route pour ajout et affichage des clients
Route::resource('/client', ClientController::class);
// Route pour ajout et affichage des demandes
Route::resource('/demande', DemandeController::class);

                        // ******Routes API Magic-link*****//
// Route d'envoi du magic link pour les artisans
Route::post("/magic-link/artisan", [MagicLoginController::class, "sendMagicLink"]);

// Route de connexion artisan
Route::post("/auth/artisan", [MagicLoginController::class, "artisanLogin"]);



