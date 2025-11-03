<?php

namespace App\Filament\Resources\Programs\DayExercises\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DayExerciseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('training_day_id')
                    ->numeric(),
                TextEntry::make('exercise_id')
                    ->numeric(),
                TextEntry::make('order')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
