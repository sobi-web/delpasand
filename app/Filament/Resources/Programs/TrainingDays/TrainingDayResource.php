<?php

namespace App\Filament\Resources\Programs\TrainingDays;

use App\Filament\Resources\Programs\TrainingDays\Pages\CreateTrainingDay;
use App\Filament\Resources\Programs\TrainingDays\Pages\EditTrainingDay;
use App\Filament\Resources\Programs\TrainingDays\Pages\ListTrainingDays;
use App\Filament\Resources\Programs\TrainingDays\Pages\ViewTrainingDay;
use App\Filament\Resources\Programs\TrainingDays\Schemas\TrainingDayForm;
use App\Filament\Resources\Programs\TrainingDays\Schemas\TrainingDayInfolist;
use App\Filament\Resources\Programs\TrainingDays\Tables\TrainingDaysTable;
use App\Models\Programs\TrainingDay;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TrainingDayResource extends Resource
{
    protected static ?string $model = TrainingDay::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Training Day';

    public static function form(Schema $schema): Schema
    {
        return TrainingDayForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TrainingDayInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TrainingDaysTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTrainingDays::route('/'),
            'create' => CreateTrainingDay::route('/create'),
            'view' => ViewTrainingDay::route('/{record}'),
            'edit' => EditTrainingDay::route('/{record}/edit'),
        ];
    }
}
