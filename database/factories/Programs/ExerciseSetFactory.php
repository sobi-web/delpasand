<?php

namespace Database\Factories\Programs;

use App\Models\Programs\ExerciseSet;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciseSetFactory extends Factory
{
    protected $model = ExerciseSet::class;

    public function definition(): array
    {
        return [
            'set_number'   => $this->faker->numberBetween(1, 5),
            'reps'         => $this->faker->numberBetween(8, 15),
            'weight'       => $this->faker->numberBetween(30, 100),
            'rest_seconds' => $this->faker->numberBetween(30, 120),
        ];
    }
}
