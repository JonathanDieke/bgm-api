<?php

namespace App\Http\Controllers;

use App\Models\DailyData;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDailyDataRequest;
use App\Http\Resources\DailyDataCollection;
use Illuminate\Support\Facades\Auth;

class DailyDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     * @return \App\Http\Resources\DailyDataCollection
     */
    public function index(Request $request)
    {
        // $meals = DailyData::all();
        // return response()->json(["data" => $meals]);
        return new DailyDataCollection(Auth::user()->dailyData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreDailyDataRequest $request)
    {
        $data = $request->validated();

        if(isset($data["id"])){
            $dailyData = DailyData::findOrFail($data["id"]); 
            $dailyData->update($data);
            return response()->json(["message" => "Mise à jour réussie !", "data" => $dailyData], status:201);
        }else{
            $data["user_id"] = $request->user()->id ;
            $dailyData = DailyData::create($data);
            return response()->json(["message" => "Enregistrement réussi !", "data" => $dailyData], status:201);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DailyData  $dailyData
     * @return \Illuminate\Http\Response
     */
    public function show(DailyData $dailyData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DailyData  $dailyData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyData $dailyData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DailyData  $dailyData
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyData $dailyData)
    {
        //
    }
}
