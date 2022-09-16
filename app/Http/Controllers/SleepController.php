<?php

namespace App\Http\Controllers;

use App\Models\Sleep;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSleepRequest;

class SleepController extends Controller
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
    public function store(StoreSleepRequest $request)
    {
        $data = $request->validated();

        if(isset($data["id"])){
            $sleep = Sleep::findOrFail($data["id"]);
            $sleep->update($data);
            return response()->json(["message" => "Mise à jour réussie !", "data" => $sleep], status:201);
        }else{
            $sleep = Sleep::create($data);
            return response()->json(["message" => "Enregistrement réussi !", "data" => $sleep], status:201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sleep  $sleep
     * @return \Illuminate\Http\Response
     */
    public function show(Sleep $sleep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sleep  $sleep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sleep $sleep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sleep  $sleep
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sleep $sleep)
    {
        //
    }
}
