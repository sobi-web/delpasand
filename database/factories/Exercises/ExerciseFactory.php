<?php

namespace Database\Factories\Exercises;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3), // مثلا "Barbell Bench Press"
            'description' => $this->faker->paragraph(),
            'skill_complexity' => $this->faker->randomElement(['Beginner', 'Intermediate', 'Advanced']),
            'image' => 'images/exercise-' . $this->faker->numberBetween(1, 10) . '.jpg',
        ];
    }
}
