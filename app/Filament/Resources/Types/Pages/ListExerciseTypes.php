<?php

namespace App\Filament\Resources\Types\Pages;

use App\Filament\Resources\Types\ExerciseTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListExerciseTypes extends ListRecords
{
    protected static string $resource = ExerciseTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
