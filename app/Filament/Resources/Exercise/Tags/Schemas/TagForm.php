<?php

namespace App\Filament\Resources\Exercise\Tags\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                ->label('نام'),
                Select::make('parent')
                    ->relationship('parent', 'name')
                    ->label('دسته اصلی'),
            ]);
    }
}
