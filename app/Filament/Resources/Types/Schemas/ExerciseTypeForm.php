<?php

namespace App\Filament\Resources\Types\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExerciseTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('parent')
                    ->numeric(),
            ]);
    }
}
