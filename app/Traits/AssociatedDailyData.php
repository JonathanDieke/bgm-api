<?php
namespace App\Traits;
use Illuminate\Support\Facades\Auth;
use App\Models\DailyData;
use Illuminate\Database\Eloquent\Model;

trait AssociatedDailyData{
    /**
     *
     * @param  Array  $data
     * @param  String $Model
     *
     * @return \Illuminate\Http\JsonResponse 
     */
    public function storeOrUpdatedAssociatedDailyData(Array $data, String $Model){
        // Daily data déjà existante
        if(Auth::user()->dailyData->sortByDesc('created_at')->first()?->created_at->isToday()){
            if(isset($data["id"])){ // Mise à jour d'une instance de model
                $model = $Model::findOrFail($data["id"]);
                // dd($data);
                $model->update($data);
                return response()->json(["message" => "Mise à jour réussie !", "data" => $model], status:201);
            }else{ // création d'une nouvelle instance de model
                $data['daily_data_id'] = Auth::user()->dailyData->sortByDesc('created_at')->first()->id ;
                $model = $Model::create($data);
                return response()->json(["message" => "Enregistrement réussi !", "data" => $model], status:201);
            }
        }

        //daily data inexistante
        // création d'une daily data
        $dailyData = DailyData::create(["user_id" => Auth::user()->id]);
        // récupération de l'id de la daily data
        $data['daily_data_id'] = $dailyData->id ;
        // création d'une nouvelle instance de model avec l'id de la nouvelle daily data
        $model = $Model::create($data);
        // retourne la réponse du traitement
        return response()->json(["message" => "Enregistrement réussi !", "data" => $model], status:201);

    }
}
