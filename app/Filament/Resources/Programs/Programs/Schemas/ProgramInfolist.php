<?php

namespace App\Filament\Resources\Programs\Programs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProgramInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title')
                ->label('نام برنامه'),
                TextEntry::make('description')
                    ->label('توضیحات')
                    ->placeholder('-')

                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->label('تاریخ ایجاد')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->label('تاریخ آخرین تغییر')
                    ->placeholder('-'),

                Section::make('برنامه تمرینی')
                    ->columnSpanFull()
                    ->schema([
                        ViewEntry::make('training_days_table')
                            ->view('filament.infolists.training-days-table')
                      ,
                    ]),
            ]);
    }
}
