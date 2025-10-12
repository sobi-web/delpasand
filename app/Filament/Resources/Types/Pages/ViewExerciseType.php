<?php

namespace App\Filament\Resources\Types\Pages;

use App\Filament\Resources\Types\ExerciseTypeResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewExerciseType extends ViewRecord
{
    protected static string $resource = ExerciseTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
