<?php

namespace App\Filament\Resources\Programs\DayExercises\Pages;

use App\Filament\Resources\Programs\DayExercises\DayExerciseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDayExercises extends ListRecords
{
    protected static string $resource = DayExerciseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
