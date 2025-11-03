<?php

namespace Database\Factories\Programs;

use App\Models\Programs\Program;
use App\Models\Programs\TrainingDay;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingDayFactory extends Factory
{
    protected $model = TrainingDay::class;

    public function definition(): array
    {
        return [
            'title' => 'Day ' . fake()->numberBetween(1, 7),
            'day_of_week' => fake()->numberBetween(0, 6),
            'program_id' => Program::factory(),
        ];
    }

    /**
     * با تمرین‌های روزانه
     */
    public function withDayExercises(int $count = 4): static
    {
        return $this->has(
            \App\Models\Programs\DayExercise::factory()->count($count),
            'dayExercises'
        );
    }
}
