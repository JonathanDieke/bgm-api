<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Insulin>
 */
class InsulinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dailyDataID = \App\Models\DailyData::all()->random()->id;
        
        return [
            'type' => Arr::random(["oral", "injection"]),
            'mark' => $this->faker->sentence(2),
            'hour' => $this->faker->numberBetween(int1:0, int2:23),
            //Glycémie avant prise de l'insuline ??
            'glycemia' => $this->faker->randomFloat(nbMaxDecimals:2, min:50, max:200),
            'daily_data_id' => $dailyDataID,
        ];
    }
}
