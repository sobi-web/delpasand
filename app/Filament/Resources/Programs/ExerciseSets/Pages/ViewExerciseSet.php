<?php

namespace App\Filament\Resources\Programs\ExerciseSets\Pages;

use App\Filament\Resources\Programs\ExerciseSets\ExerciseSetResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewExerciseSet extends ViewRecord
{
    protected static string $resource = ExerciseSetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
