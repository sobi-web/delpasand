<?php

namespace App\Filament\Resources\Exercise\Types\Pages;

use App\Filament\Resources\Exercise\Types\ExerciseTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateExerciseType extends CreateRecord
{
    protected static string $resource = ExerciseTypeResource::class;
}
