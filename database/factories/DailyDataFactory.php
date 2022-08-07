<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DailyData>
 */
class DailyDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userID = \App\Models\User::all()->random()->id ;

        return [
            'nb_hypoglycemia' => $this->faker->numberBetween(int1: 0, int2:5),
            'nb_hyperglycemia' => $this->faker->numberBetween(int1: 0, int2:5),
            'is_sick' => $this->faker->numberBetween(int1:0, int2:1),
            'user_id' => $userID,
        ];
    }
}
