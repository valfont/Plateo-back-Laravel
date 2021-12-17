<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demande;
// use Illuminate\Support\Facades\Validator;


class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    //     Validator::make($request->all(), [
    //         'title'=> 'string|unique:demandes|required',
    //         'description'=> 'string',
    //         'adresse' => 'string',
    //         'clients_id' => 'integer',
    //         'admins_id' => 'integer',
    //         'artisans_id' => 'integer',
    //         'start' => 'nullable|date',
    //         'end' => 'nullable|date|after:start',
    //         'status' => 'string'
    //    ])->validate();
        $data = $request->all();
        $demande = Demande::create($data);
        
        return response()->json(['success'=> $demande,
                                  'result'=>'New mission added with success']);
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
        //
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
