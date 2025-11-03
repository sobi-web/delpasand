<?php

namespace App\Filament\Resources\Programs\TrainingDays\Pages;

use App\Filament\Resources\Programs\TrainingDays\TrainingDayResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTrainingDays extends ListRecords
{
    protected static string $resource = TrainingDayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
