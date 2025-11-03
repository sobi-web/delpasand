<?php

namespace Database\Seeders;

use App\Models\Exercises\Exercise;
use Illuminate\Database\Seeder;
use App\Models\Programs\Program;
use App\Models\Programs\TrainingDay;
use App\Models\Programs\DayExercise;
use App\Models\Programs\ExerciseSet;
use Database\Factories\Exercise\ExerciseFactory;

class ProgramSeeder extends Seeder
{
    /**
     * اجرای Seeder
     */
    public function run(): void
    {
        // تعداد برنامه‌هایی که می‌خوای ساخته بشن
        $programCount = 5;

        \App\Models\Programs\Program::factory()
            ->count($programCount)
            ->create()
            ->each(function (Program $program) {

                // برای هر برنامه ۳ روز تمرینی بساز
                $trainingDays = TrainingDay::factory()
                    ->count(3)
                    ->create(['program_id' => $program->id]);

                $trainingDays->each(function (TrainingDay $day) {

                    // برای هر روز تمرینی ۴ تمرین بساز
                    $dayExercises = DayExercise::factory()
                        ->count(4)
                        ->create([
                            'training_day_id' => $day->id,
                            'exercise_id' => Exercise::factory()->create()->id,
                        ]);

                    $dayExercises->each(function (DayExercise $exerciseRow) {
                        // برای هر تمرین ۳ ست بساز
                        ExerciseSet::factory()
                            ->count(3)
                            ->create([
                                'day_exercise_id' => $exerciseRow->id,
                            ]);
                    });
                });
            });

        $this->command->info("✅ {$programCount} training programs seeded successfully!");
    }
}
