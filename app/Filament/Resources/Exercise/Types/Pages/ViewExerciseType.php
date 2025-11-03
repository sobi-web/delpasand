<?php

namespace App\Filament\Resources\Exercise\Types\Pages;

use App\Filament\Resources\Exercise\Types\ExerciseTypeResource;
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
