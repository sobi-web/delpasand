<?php

namespace App\Filament\Resources\Exercise\Exercises\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ExerciseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                ->label('نام'),
                TextEntry::make('description')
                    ->label('توضیحات')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('skill_complexity')
                    ->label('میزان سختی')
                    ->badge(),
                ImageEntry::make('image')
                    ->label('تصویر')
                    ->placeholder('-')
                    ->disk('local')
                    ->visibility('public'),
                TextEntry::make('created_at')
                    ->label('تاریخ ایجاد')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('تاریخ آخرین تغییر')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
