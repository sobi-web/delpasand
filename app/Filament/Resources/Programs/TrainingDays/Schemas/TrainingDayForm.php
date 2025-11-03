<?php

namespace App\Filament\Resources\Programs\TrainingDays\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TrainingDayForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('program_id')
                    ->required()
                    ->numeric(),
                TextInput::make('title'),
                TextInput::make('day_of_week')
                    ->required()
                    ->numeric(),
            ]);
    }
}
