<?php

namespace App\Filament\Resources\Exercise\Tags\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TagInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name')
                    ->label('نام')
                ,
                TextEntry::make('parent.name')
                    ->label('دسته اصلی')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->label('تاریخ ایجاد')

                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-')
                    ->label('تاریخ آخرین تغییر')
                ,
            ]);
    }
}
