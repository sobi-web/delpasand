<?php

namespace App\Filament\Resources\Tools\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ToolForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('parent')
                    ->relationship('parent', 'name')
                    ->label('Parent'),
            ]);

    }
}
