<?php

namespace App\Filament\Resources\Exercise\Exercises\Tables;

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
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class ExercisesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->label('نام'),
                BadgeColumn::make('skill_complexity')
                    ->label('میزان سختی')
                    ->colors([
                        'primary' => 'Intermediate',
                        'success' => 'Beginner',
                        'danger' => 'Advanced',
                    ]),
                ImageColumn::make('image')
                    ->label('تصویر')
                    ->getStateUsing(fn ($record) => $record->image ? Storage::url($record->image) : null)
                ,
                TextColumn::make('created_at')
                    ->label('تاریخ ایجاد')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('تاریخ آخرین آپدیت')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('tags.name')
                ->label('برچسب ها'),
                TextColumn::make('tools.name')
                ->label('ابزار ها'),
                TextColumn::make('ExerciseTypes.name')
                ->label('نوع تمرین'),
                TextColumn::make('MuscleGroups.name')
                ->label('گروه عضلانی')

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
