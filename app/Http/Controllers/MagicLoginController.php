<?php

namespace App\Http\Controllers;

use App\Mail\MagicMail;
use Illuminate\Http\Request;
use App\Models\Artisan;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class MagicLoginController extends Controller
{
    /**
     * Send Magic Link
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendMagicLink(Request $request)
    {
        // Récupérer le mail du login artisan
        $email = $request->input('email');

        // Trouver le meme mail dans la base de donnée Artisan
        $artisan = Artisan::where('email','=', $email)->first();

        if(!isset($artisan)) {
            return response()->json(["message" => "Token non valide."],  401);
        }
        
            // Générer un magic token
            $loginToken = Str::random(30);
            
            // Mise à jour de la ligne artisan pour insérer le token 
            $artisan->loginToken = $loginToken;

            $artisan->save();
            
            // Envoyer un mail avec le lien contenant le loginToken
            Mail::to($email)->send(new MagicMail($loginToken));

            return response()->json(["message" => "Vous allez recevoir un mail contenant un lien de connexion."]);

    }

    /**
     * Artisan Login
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function artisanLogin(Request $request) {

        // Récupérer le token de connexion dans la requête
        $loginToken = $request->input("loginToken");

        // Vérifier si le token existe
        if(!isset($loginToken)) {
            return response()->json([
                "message" => "Aucun token de connexion."
            ], 400);
        }

        // Retrouver l'artisan à partir du token de connexion
        $artisan = Artisan::where("loginToken", "=", $loginToken)->first();

        // Vérifier si l'artisan a été trouvé
        if(!isset($artisan)) {
            return response()->json(["message" => "Token non valide."], 401);
        }

        // Supprimer le token
        $artisan->loginToken = null;
        $artisan->save();

        // Générer le JWT avec Sanctum

        return response()->json(["token" => "123456789"]);
    }
}
