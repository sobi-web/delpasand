<?php

namespace App\Filament\Resources\Exercise\Types\Tables;

use App\Models\Exercises\ExerciseType;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExerciseTypesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function ($query) {
                $ids = ExerciseType::hierarchyOrderedIds();

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
                        return ExerciseType::hierarchy()[$record->id] ?? $state;
                    }),
                TextColumn::make( 'parent.name' === '1' ? '-' : 'parent.name'  )
                    ->numeric()
                    ->label(' دسته اصلی')

                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
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
