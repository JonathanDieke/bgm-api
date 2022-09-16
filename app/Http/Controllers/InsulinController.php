<?php

namespace App\Http\Controllers;

use App\Models\Insulin;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInsulinRequest;

class InsulinController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreInsulinRequest $request)
    {
        $data = $request->validated();

        if(isset($data["id"])){
            $insulin = Insulin::findOrFail($data["id"]);
            $insulin->update($data);
            return response()->json(["message" => "Mise à jour réussie !", "data" => $insulin], status:201);
        }else{
            $insulin = Insulin::create($data);
            return response()->json(["message" => "Enregistrement réussi !", "data" => $insulin], status:201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insulin  $insulin
     * @return \Illuminate\Http\Response
     */
    public function show(Insulin $insulin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Insulin  $insulin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insulin $insulin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Insulin  $insulin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insulin $insulin)
    {
        //
    }
}
