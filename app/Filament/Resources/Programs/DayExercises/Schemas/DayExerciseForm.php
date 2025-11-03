<?php

namespace App\Filament\Resources\Programs\DayExercises\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DayExerciseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('training_day_id')
                    ->required()
                    ->numeric(),
                TextInput::make('exercise_id')
                    ->required()
                    ->numeric(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }
}
