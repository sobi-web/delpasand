<?php

namespace App\Filament\Resources\Programs\DayExercises\Pages;

use App\Filament\Resources\Programs\DayExercises\DayExerciseResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDayExercise extends ViewRecord
{
    protected static string $resource = DayExerciseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
