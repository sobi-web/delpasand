<?php

namespace App\Filament\Resources\Exercise\Exercises\Pages;

use App\Filament\Resources\Exercise\Exercises\ExerciseResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewExercise extends ViewRecord
{
    protected static string $resource = ExerciseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
