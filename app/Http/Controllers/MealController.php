<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMealRequest;
use App\Http\Resources\MealCollection;
use App\Models\Meal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DailyData;
use App\Traits\AssociatedDailyData;

class MealController extends Controller
{

    use AssociatedDailyData ;

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     * @return \App\Http\Resources\MealCollection
     *
     */
    public function index()
    {
        $meals = Meal::all();
        // return response()->json(["data" => $meals]);
        return new MealCollection(Auth::user()->dailyData->meals);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreMealRequest $request)
    {
        $data = $request->validated();

        return $this->storeOrUpdatedAssociatedDailyData($data, Meal::class);

        // Daily data déjà existante
        // if(Auth::user()->dailyData->sortByDesc('created_at')->first()?->created_at->isToday()){

        //     if(isset($data["id"])){ // Mise à jour d'une instance de meal
        //         $meal = Meal::findOrFail($data["id"]);
        //         $meal->update($data);
        //         return response()->json(["message" => "Mise à jour réussie !", "data" => $meal], status:201);
        //     }else{ // création d'une nouvelle instance de meal
        //         $data['daily_data_id'] = Auth::user()->dailyData->sortByDesc('created_at')->first()->id ;
        //         $meal = Meal::create($data);
        //         return response()->json(["message" => "Enregistrement réussi !", "data" => $meal], status:201);
        //     }
        // }

        // //daily data inexistante
        // // création d'une daily data
        // $dailyData = DailyData::create(["user_id" => Auth::user()->id]);
        // // récupération de l'id de la daily data
        // $data['daily_data_id'] = $dailyData->id ;
        // // création d'une nouvelle instance de meal avec l'id de la nouvelle daily data
        // $meal = Meal::create($data);
        // // retourne la réponse du traitement
        // return response()->json(["message" => "Enregistrement réussi !", "data" => $meal], status:201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meal $meal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        //
    }
}
