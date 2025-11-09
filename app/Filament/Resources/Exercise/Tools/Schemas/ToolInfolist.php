<?php

namespace App\Filament\Resources\Exercise\Tools\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ToolInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('نام'),
                TextEntry::make('parent_id')
                    ->label('دسته اصلی')
                    ->numeric()
                    ->placeholder('-'),
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
