<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\Client;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $demande = Demande::all();
      return response()->json($demande);
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

        //dans data, on récupère tout ce qu'il y a dans le formulaire
        $demande=Demande::create(['title'=>$request->title,
                                  'description'=>$request->description,
                                  'adresse'=>$request->adresse,
                                  'clients_id'=>$request->clients_id,
                                  'start'=>$request->start,
                                  'end'=>$request->end,
                                  'status'=>$request->status]);



        return response()->json($demande);

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
        $demande = Demande::find($id);
        $demande->update($request->all());
        $demande->save();
        return response()->json($demande);
        // $demande = Demande::find($id);
        // Demande::where('id', $id)->update(["status" => $request->status]);
        // return response()->json($demande);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $demande = Demande::find($id);
        $demande->delete();
        return response()->json($demande);
    }
}
