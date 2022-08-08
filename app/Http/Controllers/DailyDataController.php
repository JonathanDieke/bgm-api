<?php

namespace App\Http\Controllers;

use App\Models\DailyData;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDailyDataRequest;

class DailyDataController extends Controller
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
    public function store(StoreDailyDataRequest $request)
    {
        $data = $request->validated();

        $dailyData = DailyData::create($data);

        return response()->json(["message" => "Enregistrement réussi !", "data" => $dailyData], status:201);
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
