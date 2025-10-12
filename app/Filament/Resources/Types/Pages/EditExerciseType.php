<?php

namespace App\Filament\Resources\Types\Pages;

use App\Filament\Resources\Types\ExerciseTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditExerciseType extends EditRecord
{
    protected static string $resource = ExerciseTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
