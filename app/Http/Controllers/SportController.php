<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSportRequest;
use App\Traits\AssociatedDailyData;

class SportController extends Controller
{
    use AssociatedDailyData ;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreSportRequest $request)
    {
        $data = $request->validated();

        return $this->storeOrUpdatedAssociatedDailyData($data, Sport::class);

        // if(isset($data["id"])){
        //     $sport = Sport::findOrFail($data["id"]);
        //     $sport->update($data);
        //     return response()->json(["message" => "Mise à jour réussie !", "data" => $sport], status:201);
        // }else{
        //     $sport = Sport::create($data);
        //     return response()->json(["message" => "Enregistrement réussi !", "data" => $sport], status:201);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function show(Sport $sport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sport $sport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sport  $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sport $sport)
    {
        //
    }
}
