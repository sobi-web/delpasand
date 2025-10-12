<?php

namespace App\Filament\Resources\Exercises\Pages;

use App\Filament\Resources\Exercises\ExerciseResource;
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
            'Beginner' => Tab::make()->query(fn ($query) => $query->where('skill_complexity', 'Beginner')),
            'Intermediate' => Tab::make()->query(fn ($query) => $query->where('skill_complexity', 'Intermediate')),
            'Advanced' => Tab::make()->query(fn ($query) => $query->where('skill_complexity', 'Advanced')),
        ];
    }


}
