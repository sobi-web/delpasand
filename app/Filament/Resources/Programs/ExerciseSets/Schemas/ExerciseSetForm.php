<?php

namespace App\Filament\Resources\Programs\ExerciseSets\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExerciseSetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('day_exercise_id')
                    ->required()
                    ->numeric(),
                TextInput::make('set_number')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('reps')
                    ->required()
                    ->numeric()
                    ->default(10),
                TextInput::make('weight')
                    ->numeric(),
                TextInput::make('rest_seconds')
                    ->required()
                    ->numeric()
                    ->default(60),
            ]);
    }
}
