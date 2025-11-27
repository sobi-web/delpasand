<?php

namespace App\Filament\Resources\Exercise\Tools\Tables;

use App\Models\Exercises\Tool;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ToolsTable
{

    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function ($query) {
                $ids = Tool::hierarchyOrderedIds();

                if (empty($ids)) {
                    return $query;
                }

                return $query
                    ->whereIn('id', $ids)
                    ->orderByRaw("FIELD(id, " . implode(',', $ids) . ")");
            })
            ->columns([
                TextColumn::make('name')
                    ->label('نام')
                    ->searchable()
                    ->formatStateUsing(function ($state, $record) {
                        return Tool::hierarchy()[$record->id] ?? $state;
                    }),
                TextColumn::make('parent.name')
                    ->label('دسته اصلی')
                    ->numeric(),
                TextColumn::make('created_at')
                    ->label('تاریخ ایجاد')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('تاریخ ایجاد')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
