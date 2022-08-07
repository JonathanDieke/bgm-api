<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sport>
 */
class SportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dailyDataID = \App\Models\DailyData::all()->random()->id ;
        
        return [
            'type' => $this->faker->text(15),
            'start_hour' => $this->faker->numberBetween(int1:5, int2:19),
            'end_hour' => $this->faker->numberBetween(int1:5, int2:19),
            'glycemia_before' => $this->faker->randomFloat(nbMaxDecimals:2, min:50, max:200),
            'glycemia_after' => $this->faker->randomFloat(nbMaxDecimals:2, min:50, max:200),
            'daily_data_id' => $dailyDataID,
        ];
    }
}
