<?php

namespace App\Filament\Resources\Exercise\MuscleGroups\Pages;

use App\Filament\Resources\Exercise\MuscleGroups\MuscleGroupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMuscleGroups extends ListRecords
{
    protected static string $resource = MuscleGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
