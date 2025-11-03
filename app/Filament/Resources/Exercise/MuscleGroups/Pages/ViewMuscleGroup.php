<?php

namespace App\Filament\Resources\Exercise\MuscleGroups\Pages;

use App\Filament\Resources\Exercise\MuscleGroups\MuscleGroupResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMuscleGroup extends ViewRecord
{
    protected static string $resource = MuscleGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
