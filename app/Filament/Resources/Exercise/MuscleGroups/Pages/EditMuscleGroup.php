<?php

namespace App\Filament\Resources\Exercise\MuscleGroups\Pages;

use App\Filament\Resources\Exercise\MuscleGroups\MuscleGroupResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMuscleGroup extends EditRecord
{
    protected static string $resource = MuscleGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
