<?php

namespace App\Filament\Resources\Programs\TrainingDays\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TrainingDayInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('program_id')
                    ->numeric(),
                TextEntry::make('title')
                    ->placeholder('-'),
                TextEntry::make('day_of_week')
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
