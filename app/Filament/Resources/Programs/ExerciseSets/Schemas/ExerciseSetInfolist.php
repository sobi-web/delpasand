<?php

namespace App\Filament\Resources\Programs\ExerciseSets\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ExerciseSetInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('day_exercise_id')
                    ->numeric(),
                TextEntry::make('set_number')
                    ->numeric(),
                TextEntry::make('reps')
                    ->numeric(),
                TextEntry::make('weight')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('rest_seconds')
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
