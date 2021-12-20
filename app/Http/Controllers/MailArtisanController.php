<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artisan;
use Illuminate\Support\Str;

class MailArtisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // récupérer le mail du login artisan

        $data = $request->get('email');

        // trouver le meme mail dans la base de donnée Artisan

        $MailArtisan = Artisan::where('email','=',$data)->first();
        
        // générer un token

        $token = Str::random(30);
        
        
        // update la ligne artisan pour incérer le token 

        $MailArtisan->loginToken=$token->loginToken;
        $MailArtisan->save();
        return response()->json($MailArtisan);

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->get('email');
        $MailArtisan = Artisan::where('email','=',$data)->first();
        $request = Str::random(30);
        $MailArtisan->loginToken=$request->loginToken;
        $MailArtisan->save();
        return response()->json($MailArtisan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
