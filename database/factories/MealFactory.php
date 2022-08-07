<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = Arr::random(["first_breakfast", "breakfast", "dinner"]);
        $hour = $type == "first_breakfast" ? Arr::random([5, 6, 7, 8, 9, 10]) :
                ($type == "breakfast" ? Arr::random([12, 13, 14]) : Arr::random([18, 19, 20]));
        $dailyDataID = \App\Models\DailyData::all()->random()->id ;

        return [
            'type' => $type ,
            'hour'=> $hour,
            'glycemia_before' => $this->faker->randomFloat(nbMaxDecimals:2, min:50, max:200),
            'glycemia_after' => $this->faker->randomFloat(nbMaxDecimals:2, min:50, max:200),
            'content' => $this->faker->paragraph($nbSentences = 1),
            'daily_data_id' => $dailyDataID,
        ];
    }
}
