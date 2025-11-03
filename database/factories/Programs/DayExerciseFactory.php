<?php

namespace Database\Factories\Programs;

use App\Models\Exercises\Exercise;
use App\Models\Programs\DayExercise;
use App\Models\Programs\TrainingDay;
use Illuminate\Database\Eloquent\Factories\Factory;

class DayExerciseFactory extends Factory
{
    protected $model = DayExercise::class;

    public function definition(): array
    {
        return [
            'training_day_id' => TrainingDay::factory(),
            'exercise_id'     => Exercise::factory(),
            // اگر الان داری فیلد order داری:
            'order'           => $this->faker->numberBetween(1, 20), // بدون unique()
        ];
    }

    /**
     * با ست‌های تمرینی
     */
    public function withExerciseSets(int $count = 3): static
    {
        return $this->has(
            \App\Models\Programs\ExerciseSet::factory()->count($count),
            'exerciseSets'
        );
    }
}
