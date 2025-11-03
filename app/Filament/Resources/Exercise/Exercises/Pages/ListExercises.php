<?php

namespace App\Filament\Resources\Exercise\Exercises\Pages;

use App\Filament\Resources\Exercise\Exercises\ExerciseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;

class ListExercises extends ListRecords
{
    protected static string $resource = ExerciseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }


    public function getTabs(): array
    {
        return [
            null => Tab::make('All'),
            'مبتدی' => Tab::make()->query(fn ($query) => $query->where('skill_complexity', 'Beginner')),
            'متوسط' => Tab::make()->query(fn ($query) => $query->where('skill_complexity', 'Intermediate')),
            'پیشرفته' => Tab::make()->query(fn ($query) => $query->where('skill_complexity', 'Advanced')),
        ];
    }


}
