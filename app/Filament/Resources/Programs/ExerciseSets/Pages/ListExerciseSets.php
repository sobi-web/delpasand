<?php

namespace App\Filament\Resources\Programs\ExerciseSets\Pages;

use App\Filament\Resources\Programs\ExerciseSets\ExerciseSetResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExerciseSets extends ListRecords
{
    protected static string $resource = ExerciseSetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
