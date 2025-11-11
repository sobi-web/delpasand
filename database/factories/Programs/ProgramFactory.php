<?php

namespace Database\Factories\Programs;

use App\Models\Programs\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    protected $model = Program::class;

    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'customer' => $this->faker->name(),
            'week_count' => $this->faker->numberBetween(1, 8),
        ];
    }

    /**
     * برنامه با چند روز تمرینی
     */
    public function withTrainingDays(int $count = 3): static
    {
        return $this->has(
            \App\Models\Programs\TrainingDay::factory()->count($count),
            'trainingDays'
        );
    }
}
