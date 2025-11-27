<?php

namespace App\Filament\Resources\Exercise\MuscleGroups\Tables;

use App\Models\Exercises\MuscleGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MuscleGroupsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function ($query) {
                $ids = MuscleGroup::hierarchyOrderedIds();

                if (empty($ids)) {
                    return $query;
                }

                return $query
                    ->whereIn('id', $ids)
                    ->orderByRaw("FIELD(id, " . implode(',', $ids) . ")");
            })
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('نام')
                ->formatStateUsing(function ($state, $record) {
                return MuscleGroup::hierarchy()[$record->id] ?? $state;
            }),
                TextColumn::make('parent.name')
                    ->numeric()
                    ->label('دسته اصلی')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('تاریخ ساخت')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('تاریخ آخرین تغییر')
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
