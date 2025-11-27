<?php

namespace App\Filament\Resources\Exercise\Types\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ExerciseTypeInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('نام'),
                TextEntry::make('parent.name')
                    ->label('دسته اصلی')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-')
                    ->label('تاریخ ایجاد')
                ,
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-')
                    ->label('تاریخ آخرین تغییر')
                ,
            ]);
    }
}
