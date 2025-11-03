<?php

namespace App\Filament\Resources\Programs\ExerciseSets\Pages;

use App\Filament\Resources\Programs\ExerciseSets\ExerciseSetResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditExerciseSet extends EditRecord
{
    protected static string $resource = ExerciseSetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
