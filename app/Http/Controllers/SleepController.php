<?php

namespace App\Http\Controllers;

use App\Models\Sleep;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSleepRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\DailyData;
use App\Traits\AssociatedDailyData;

class SleepController extends Controller
{
    use AssociatedDailyData ;
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

        return $this->storeOrUpdatedAssociatedDailyData($data, Sleep::class);

        // Daily data déjà existante
        // if(Auth::user()->dailyData->sortByDesc('created_at')->first()?->created_at->isToday()){

        //     if(isset($data["id"])){ // Mise à jour d'une instance de sleep
        //         $sleep = Sleep::findOrFail($data["id"]);
        //         $sleep->update($data);
        //         return response()->json(["message" => "Mise à jour réussie !", "data" => $sleep], status:201);
        //     }else{ // création d'une nouvelle instance de sleep
        //         $data['daily_data_id'] = Auth::user()->dailyData->sortByDesc('created_at')->first()->id ;
        //         $sleep = Sleep::create($data);
        //         return response()->json(["message" => "Enregistrement réussi !", "data" => $sleep], status:201);
        //     }
        // }

        // //daily data inexistante
        // // création d'une daily data
        // $dailyData = DailyData::create(["user_id" => Auth::user()->id]);
        // // récupération de l'id de la daily data
        // $data['daily_data_id'] = $dailyData->id ;
        // // création d'une nouvelle instance de sleep avec l'id de la nouvelle daily data
        // $sleep = Sleep::create($data);
        // // retourne la réponse du traitement
        // return response()->json(["message" => "Enregistrement réussi !", "data" => $sleep], status:201);


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
