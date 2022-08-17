<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sleep>
 */
class SleepFactory extends Factory
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
            'start_hour' => $this->faker->numberBetween(int1:20, int2:23),
            'end_hour' => $this->faker->numberBetween(int1:4, int2:8),
            'glycemia_before' => $this->faker->randomFloat(nbMaxDecimals:2, min:50, max:200),
            'glycemia_after' => $this->faker->randomFloat(nbMaxDecimals:2, min:50, max:200),
            'daily_data_id' => $dailyDataID,
        ];
    }
}
