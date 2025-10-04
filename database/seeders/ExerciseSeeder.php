<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise\Exercise;
use App\Models\Exercise\MuscleGroup;
use App\Models\Exercise\Tool;
use App\Models\Exercise\Tag;
use App\Models\Exercise\ExerciseType;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        $chest = MuscleGroup::factory()->create(['name' => 'Chest']);
        $back = MuscleGroup::factory()->create(['name' => 'Back']);
        $legs = MuscleGroup::factory()->create(['name' => 'Legs']);

        MuscleGroup::factory()->create(['name' => 'Upper Chest', 'parent_id' => $chest->id]);
        MuscleGroup::factory()->create(['name' => 'Lower Chest', 'parent_id' => $chest->id]);
        MuscleGroup::factory()->create(['name' => 'Quads', 'parent_id' => $legs->id]);
        MuscleGroup::factory()->create(['name' => 'Hamstrings', 'parent_id' => $legs->id]);

        $tools = Tool::factory()->count(5)->create();
        $tags = Tag::factory()->count(5)->create();
        $types = ExerciseType::factory()->count(3)->create();

        Exercise::factory()->count(10)->create()->each(function ($exercise) use ($tools, $tags, $types) {
            $exercise->tools()->attach($tools->random(rand(1, 3))->pluck('id'));
            $exercise->tags()->attach($tags->random(rand(1, 3))->pluck('id'));
            $exercise->exerciseTypes()->attach($types->random(rand(1, 2))->pluck('id'));
            $exercise->muscleGroups()->attach(MuscleGroup::inRandomOrder()->take(rand(1, 2))->pluck('id'));
        });
    }
}
