<?php

namespace App\Filament\Resources\Programs\TrainingDays\Pages;

use App\Filament\Resources\Programs\TrainingDays\TrainingDayResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTrainingDay extends ViewRecord
{
    protected static string $resource = TrainingDayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
