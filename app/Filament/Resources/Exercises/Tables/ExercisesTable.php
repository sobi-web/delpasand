<?php

namespace App\Filament\Resources\Exercises\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use function Laravel\Prompts\text;

class ExercisesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                BadgeColumn::make('skill_complexity')
                    ->label('skill_complexity')
                    ->colors([
                        'primary' => 'Beginner',
                        'success' => 'Advanced',
                        'danger' => 'Intermediate',
                    ]),
                ImageColumn::make('image'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('tags.name'),
                TextColumn::make('tools.name'),
                TextColumn::make('ExerciseTypes.name'),
                TextColumn::make('MuscleGroups.name')

            ])
            ->filters([
                TrashedFilter::make(),


            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
                ForceDeleteAction::make(),
                RestoreAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),


            ]);
    }

//    public static function getRecordRouteBindingEloquentQuery(): Builder
//    {
//        return parent::getRecordRouteBindingEloquentQuery()
//            ->withoutGlobalScopes([
//                SoftDeletingScope::class,
//            ]);
//    }
}
