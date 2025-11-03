<?php

namespace App\Filament\Resources\Programs\DayExercises\Pages;

use App\Filament\Resources\Programs\DayExercises\DayExerciseResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditDayExercise extends EditRecord
{
    protected static string $resource = DayExerciseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
