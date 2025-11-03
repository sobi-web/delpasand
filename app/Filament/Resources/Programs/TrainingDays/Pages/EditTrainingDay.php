<?php

namespace App\Filament\Resources\Programs\TrainingDays\Pages;

use App\Filament\Resources\Programs\TrainingDays\TrainingDayResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTrainingDay extends EditRecord
{
    protected static string $resource = TrainingDayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
